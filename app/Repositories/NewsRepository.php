<?php

namespace App\Repositories;

abstract class NewsRepository extends Repository
{
    public function getNewsWithPaginate(int $perPage = 25)
    {
        return $this->model->select('id', 'title', 'published_at')->simplePaginate($perPage);
    }

    public function getFullNewsById(int $id)
    {
        return $this->model->select('title', 'body')->where('id', $id)->get();
    }
}
