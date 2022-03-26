<?php

namespace App\Models\Tenants;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'ar_name',
        'en_name',
        'price',
        'is_tax_included',
        'quantity',
        'weight',
        'tax_percentage'
    ];


    public function attributeValues()
    {
        return $this->hasMany(ProductAttributeValue::class);
    }
}
