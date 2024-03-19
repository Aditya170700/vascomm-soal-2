<?php

namespace App\Repositories;

class BaseRepository
{
    public $model;

    public function getPaginated($request)
    {
        return $this->model
            ->latest()
            ->paginate($request->per_page ?? 10);
    }

    public function find(?int $id)
    {
        return $this->model
            ->find($id);
    }

    public function store(array $data)
    {
        return $this->model
            ->create($data);
    }

    public function update(?int $id, array $data)
    {
        return $this->model
            ->where('id', $id)
            ->update($data);
    }

    public function delete(?int $id)
    {
        return $this->model
            ->where('id', $id)
            ->delete();
    }
}
