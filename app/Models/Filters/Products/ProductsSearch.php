<?php

namespace App\Models\Filters\Products;

use App\Product;
use App\Services\Filters\BaseSeach;
use App\Services\Filters\Searchable;

class ProductsSearch implements Searchable
{
    const MODEL = Product::class;

    use BaseSeach;
}
