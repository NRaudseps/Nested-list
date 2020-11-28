<?php


namespace App\Services\Section;


use App\Repositories\SectionRepository;

class UpdateSectionService
{
    protected SectionRepository $sections;

    public function __construct()
    {
        $this->sections = new SectionRepository();
    }

    public function execute($name, $description, $id)
    {
        $this->sections->update($name, $description, $id);
    }
}