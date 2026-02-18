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
    'priceToPatient',
    'discount',
    'discountType',
    'status',
    'createdBy',
    'updatedBy',
    'manufacturer',
    'distributor',
    'landedCost',
    'hospitalMarkup',
    'distributorMarkup',
    'resilienceMarkup',
    'bankCharges',
    'status',
    'sku',
    'packSize',
    'brand',
    'dosageForm',
    'strength'
    ];

   public function product()
    {
        return $this->belongsTo(Product::class, 'productId', 'productId');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturers::class, 'manufacturer', 'manufacturerId');
    }

    public function distributor()
    {
        return $this->belongsTo(Distributors::class, 'distributor', 'distributorId');
    }

    public function supplier()
    {
        return $this->belongsTo(Distributors::class, 'distributor', 'distributorId');
    }

    public function createdby()
    {
        return $this->belongsTo(User::class, 'createdBy', 'id');
    }

    public function updatedby()
    {
        return $this->belongsTo(User::class, 'updatedBy', 'id');
    }
}
