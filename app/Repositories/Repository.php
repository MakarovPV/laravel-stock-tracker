<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

abstract class Repository
{
    protected Model $model;

    public function __construct()
    {
        $this->model = app('App\Models\\' . $this->model());
    }

    /**
     * Получение имени модели для последующей работы с ней.
     *
     * @return string
     */
    private function model(): string
    {
        return basename(substr(get_class($this), 0, -10));
    }

    /**
     * Пагинация для коллекции.
     *
     * @param Collection $data
     * @param $perPage
     * @return LengthAwarePaginator
     */
    protected function paginate(Collection $data, $perPage = 25)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $paginatedData = $data->forPage($currentPage, $perPage);
        $paginator = new LengthAwarePaginator($paginatedData, $data->count(), $perPage);
        return $paginator->withPath('');
    }
}
