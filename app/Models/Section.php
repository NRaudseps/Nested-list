<?php


namespace App\Models;


class Section
{
    private int $id;
    private int $user_id;
    private ?int $parent_id;
    private string $name;
    private string $description;

    public function __construct(int $id, int $user_id, ?int $parent_id, string $name, string $description)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->parent_id = $parent_id;
        $this->name = $name;
        $this->description = $description;
    }

    public function id()
    {
        return $this->id;
    }

    public function user_id()
    {
        return $this->user_id;
    }

    public function parent_id()
    {
        return $this->parent_id;
    }

    public function name()
    {
        return $this->name;
    }

    public function description()
    {
        return $this->description;
    }
}