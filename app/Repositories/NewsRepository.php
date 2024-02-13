<?php

namespace App\Repositories;

abstract class NewsRepository extends Repository
{
    /**
     * Получение списка всех новостных заголовков.
     *
     * @param int $perPage
     * @return mixed
     */
    public function getNewsWithPaginate(int $perPage = 25): mixed
    {
        return $this->model->select('id', 'title', 'published_at')->simplePaginate($perPage);
    }

    /**
     * Получение содержимого конкретной новости.
     *
     * @param int $id
     * @return mixed
     */
    public function getFullNewsById(int $id): mixed
    {
        return $this->model->select('title', 'body')->where('id', $id)->get();
    }
}
