<?php

namespace App\Models\Tenants;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'attribute_id',
        'value'
    ];


    public function attribute()
    {
        return $this->hasOne(Attribute::class, 'id');
    }
}
