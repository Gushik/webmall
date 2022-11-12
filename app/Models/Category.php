<?php

namespace App;

use App\Models\Filters\Category\CategorySeach;
use http\Request;
use Illuminate\Database\Eloquent\Builder;
use TCG\Voyager\Models\Category as ModelsCategory;

class Category extends ModelsCategory
{

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_categories');
    }

    public function allProducts()
    {
        $allProducts = collect([]);

        $mainCategoryProducts = $this->products;

        $allProducts = $allProducts->concat($mainCategoryProducts);

        if($this->children->isNotEmpty()) {

            foreach($this->children as $child) {
                $allProducts = $allProducts->concat($child->products);

            }

        }

        return $allProducts;


    }




    public function getCategoriesBySearch(Request $request )  : Builder

    {
        $builder = (new CategorySeach())->apply($request);
        return $builder;
    }
}
