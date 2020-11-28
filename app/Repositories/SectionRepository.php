<?php


namespace App\Repositories;


use App\Bootstrap\Database;
use App\Models\Section;

class SectionRepository
{
    public function getSection($id, $userId)
    {
        $query = (new Database())
            ->query()
            ->select('*')
            ->from('sections')
            ->where('parent_id = :id AND user_id = :user_id')
            ->setParameter('id', $id)
            ->setParameter('user_id', $userId)
            ->execute()
            ->fetchAllAssociative();

        $sections = [];
        foreach ($query as $section)
            $sections[] = new Section($section['id'],
                $section['user_id'],
                $section['parent_id'],
                $section['name'],
                $section['description']
            );

        return $sections;
    }

    public function getDashboard($userId)
    {
        $query = (new Database())
            ->query()
            ->select('*')
            ->from('sections')
            ->where('parent_id is NULL AND user_id = :user_id')
            ->setParameter('user_id', $userId)
            ->execute()
            ->fetchAllAssociative();

        $sections = [];
        foreach ($query as $section)
            $sections[] = new Section($section['id'],
                $section['user_id'],
                $section['parent_id'],
                $section['name'],
                $section['description']
            );

        return $sections;
    }

    public function save($userId, $parentId, $name, $description)
    {
        (new Database())
            ->query()
            ->insert('sections')
            ->values([
                'user_id' => '?',
                'parent_id' => '?',
                'name' => '?',
                'description' => '?'
            ])
            ->setParameter(0, $userId)
            ->setParameter(1, $parentId)
            ->setParameter(2, $name)
            ->setParameter(3, $description)
            ->execute();
    }

    public function update($name, $description, $id)
    {
        (new Database())
            ->query()
            ->update('sections')
            ->where('id = :id')
            ->set('name', ':name')
            ->set('description', ':description')
            ->setParameter('id', $id)
            ->setParameter('name', $name)
            ->setParameter('description', $description)
            ->execute();
    }

    public function delete($id)
    {
        (new Database())
            ->query()
            ->delete('sections')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute();
    }
}