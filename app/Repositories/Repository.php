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
        $this->model = app($this->model());
    }

    abstract protected function model(): string;

    protected function paginate(Collection $data, $perPage = 25)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $paginatedData = $data->forPage($currentPage, $perPage);
        $paginator = new LengthAwarePaginator($paginatedData, $data->count(), $perPage);
        return $paginator->withPath('');
    }
}
