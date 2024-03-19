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
}
