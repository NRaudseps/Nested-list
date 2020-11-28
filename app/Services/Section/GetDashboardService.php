<?php


namespace App\Services\Section;


use App\Repositories\SectionRepository;

class GetDashboardService
{
    protected SectionRepository $sections;

    public function __construct()
    {
        $this->sections = new SectionRepository();
    }

    public function execute($userId)
    {
        return $this->sections->getDashboard($userId);
    }
}