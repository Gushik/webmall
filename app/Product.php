<?php

namespace App;





use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    protected $guarded = false;

    // protected $casts=[
    //     'product_attributes'=>'array'
    // ];

    protected static function booted()
    {
        static::saving(function ($product) {

            $product->product_attributes = json_encode(request('product_attributes'));
        });
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_attributes');
    }



}
