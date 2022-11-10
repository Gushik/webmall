<?php

namespace App\Models\Filters\Category;

use App\Services\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class Category_name implements Filterable
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('name', $value);
    }
}
