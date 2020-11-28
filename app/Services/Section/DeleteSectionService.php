<?php


namespace App\Services\Section;


use App\Repositories\SectionRepository;

class DeleteSectionService
{
    protected SectionRepository $sections;

    public function __construct()
    {
        $this->sections = new SectionRepository();
    }

    public function execute($id)
    {
        $this->sections->delete($id);
    }
}