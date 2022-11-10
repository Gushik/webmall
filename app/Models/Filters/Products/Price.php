<?php

namespace App\Models\Filters\Products;

use App\Services\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class Price implements Filterable
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('price', $value);
    }

}
