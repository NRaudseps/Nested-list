<?php


namespace App\Services\Section;


use App\Repositories\SectionRepository;

class StoreSectionService
{
    protected SectionRepository $sections;

    public function __construct()
    {
        $this->sections = new SectionRepository();
    }

    public function execute($userId, $parentId, $name, $description)
    {
        $this->sections->save($userId, $parentId, $name, $description);
    }
}