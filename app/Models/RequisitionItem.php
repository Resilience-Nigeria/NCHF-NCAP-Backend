<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitionItem extends Model
{
    use HasFactory;

    public $table = 'requisition_items';
    protected $fillable = [
        'requisitionId',
        'productId',
        'manufacturerId',
        'distributorId',
        'warehouseId',
        'hospitalId',
        'quantityRequested',
        'quantityDispatched',
        'quantityReceived',
        'requestedBy',
        'dispatchedBy',
        'receivedBy',
        'requestDate',
        'approvedDate',
        'receivedDate',
        'unitPrice',
        'batchNumber',
        'expiryDate',
        'warehouseStockId',
        'status',
        'remarks',
        'landedCost',
        'resilienceMarkup',
        'hospitalMarkup',
        'distributorMarkup',
        'bankCharges',
        'priceToPatient',
    ];
    protected $primaryKey = 'itemId';

    public function warehouse_stock()
    {
        return $this->belongsTo(WarehouseStock::class, 'productId', 'product');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouseId', 'warehouseId');
    }

    public function requestedByUser()
    {
        return $this->belongsTo(User::class, 'requestedBy', 'id');
    }

    public function requisition()
{
    return $this->hasMany(Requisition::class, 'requisitionId', 'requisitionId');
}


public function distributor(){
    return $this->belongsTo(Distributors::class, 'distributorId', 'distributorId');
}

public function manufacturer(){
    return $this->belongsTo(Manufacturers::class, 'manufacturerId', 'manufacturerId');
    
}
}