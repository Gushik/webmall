<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
//public function Atributes()
//{
//    return $this->hasMany(Attribute::class);
//}

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
