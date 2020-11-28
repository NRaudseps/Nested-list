<?php


namespace App\Services\Section;


class GetSectionUrlService
{
    public static function execute($parentId)
    {
        $url = '/section/' . $parentId;
        if ($parentId === '') {
            $parentId = null;
            $url = '/dashboard';
        }

        return $url;
    }
}