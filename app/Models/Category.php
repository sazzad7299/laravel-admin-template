<?php

namespace App\Models;

use App\Enums\Status;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    public const TAG = "categories";
    use HasFactory, SoftDeletes,CreatedUpdatedBy;

        Const Status = [
        'Active' => 1,
        'Inactive' => 0,
    ];

    protected  $appends = ['category_status'];

    protected  function getCategoryStatusAttribute(): string
    {
        return Status::CATEGORY_STATUS[$this->attributes['status']];
    }
}
