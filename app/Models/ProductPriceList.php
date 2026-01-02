<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPriceList extends Model
{
    use HasFactory;
    public $table = 'product_price_list';
    protected $fillable = [
    'productId',
    'price',
    'discount',
    'discountType',
    'status',
    'createdBy',
    'updatedBy',
    'manufacturer',
    'distributor',
    'landedCost',
    'distributorMarkup',
    'resilienceMarkup',
    'bankCharges',
    'status'
    ];

   public function products()
    {
        return $this->belongsTo(Product::class, 'productId', 'productId');
    }
}
