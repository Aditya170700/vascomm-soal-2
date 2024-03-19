<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const ACTIVE = true;
    const INACTIVE = false;

    protected $guarded = [];

    function getBadgeStatusAttribute()
    {
        return $this->status ? '<span class="badge bg-success">AKTIF</span>' : '<span class="badge bg-danger">TIDAK AKTIF</span>';
    }

    function getPriceIdrAttribute()
    {
        return 'Rp.' . number_format($this->price, 0, 2);
    }
}
