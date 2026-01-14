<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseStock extends Model
{
    use HasFactory;
    public $table = 'warehouse_stocks';
    protected $primaryKey = 'warehouseStockId';
    protected $fillable = ['warehouse', 'product', 'quantityAvailable', 'quantityReserved', 'manufacturer', 'distributor', 'status',
        'batchNumber', 'expiryDate', 'createdBy', 'updatedBy', 'initialQuantity', 'landedCost'];

    public function distributor()
    {
        return $this->belongsTo(Distributors::class, 'distributor', 'distributorId');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturers::class, 'manufacturer', 'manufacturerId');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse', 'warehouseId');
    }

    public function product_pricelist()
    {
        return $this->belongsTo(ProductPriceList::class, 'product', 'productId');
    }

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'createdBy', 'id');
    }

    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'updatedBy', 'id');
    }

    public function unitPriceDetails()
    {
        return $this->belongsTo(ProductPriceList::class, 'unitPrice', 'id');
    }
}
