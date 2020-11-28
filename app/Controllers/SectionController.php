<?php


namespace App\Controllers;


use App\Services\Section\DeleteSectionService;
use App\Services\Section\GetSectionsService;
use App\Services\Section\GetSectionUrlService;
use App\Services\Section\StoreSectionService;
use App\Services\Section\UpdateSectionService;

class SectionController
{
    public function show($id)
    {
        session_start();

        $sections = (new GetSectionsService())->execute($id, $_SESSION['id']);

        return require_once './resources/views/sections/section.view.php';
    }

    public function create()
    {
        return require_once './resources/views/sections/create_section.view.php';
    }

    public function store()
    {
        session_start();

        $url = GetSectionUrlService::execute($_POST['parent_id']);

        if ($_POST['parent_id'] === '') {
            $_POST['parent_id'] = null;
        }

        (new StoreSectionService())
            ->execute($_SESSION['id'],
                $_POST['parent_id'],
                $_POST['name'],
                $_POST['description']);

        header("Location: {$url}");
    }

    public function edit($id)
    {
        return require_once './resources/views/sections/edit_section.view.php';
    }

    public function update($id)
    {
        session_start();

        $url = GetSectionUrlService::execute($_POST['parent_id']);
        if ($_POST['parent_id'] === '') {
            $_POST['parent_id'] = null;
        }

        (new UpdateSectionService())->execute($_POST['name'], $_POST['description'], $id);

        header("Location: {$url}");
    }

    public function destroy($id)
    {
        session_start();

        $url = GetSectionUrlService::execute($_POST['parent_id']);
        if ($_POST['parent_id'] === '') {
            $_POST['parent_id'] = null;
        }

        (new DeleteSectionService())->execute($id);

        header("Location: {$url}");
    }
}