<?php


namespace App\Services\Section;


use App\Repositories\SectionRepository;

class GetSectionsService
{
    protected SectionRepository $sections;

    public function __construct()
    {
        $this->sections = new SectionRepository();
    }

    public function execute($id, $userId)
    {
        return $this->sections->getSection($id, $userId);
    }
}