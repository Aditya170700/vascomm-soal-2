<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function countProduct($status)
    {
        return $this->model
            ->where('status', $status)
            ->count();
    }

    public function getLimited($limit, $status = null, $skip = 0)
    {
        return $this->model
            ->when($status != null, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->latest()
            ->limit($limit)
            ->skip($skip)
            ->get();
    }
}
