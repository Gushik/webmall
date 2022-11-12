<?php

namespace App\Http\Filters;

class ProductLaptopFilter extends AbstractFilter
{
    const PRICE = 'price';
    const PRODUCT_ATTRIBUTES = 'product_attributes';
    const SHOP_ID = 'shop_id';


    /**
     * @return array
     */
    protected function getCallbacks(): array
    {
        return [
            self::PRICE => [$this, 'price'],
            self::SHOP_ID => [$this, 'shop_id'],
            self::PRODUCT_ATTRIBUTES => [$this, 'product_attributes'],
        ];
    }

    public function price(Builder $builder, $value)
    {
        dd('$value');
        $builder->where('price', $value);
    }

    public function shop_id(Builder $builder, $value)
    {
        $builder->where('shop_id', $value);
    }

    public function product_attributes(Builder $builder, $value)
    {
        $builder->where('product_attributes', $value);
    }
}
