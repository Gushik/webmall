<?php

namespace App\Models\Filters\Category;

use App\Category;
use App\Services\Filters\BaseSeach;
use App\Services\Filters\Searchable;

class CategorySeach implements Searchable
{
    const MODEL = Category::class;

    use BaseSeach;

}
