<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalStock extends Model
{
    use HasFactory;

    public $table = 'hospital_stocks';
    protected $fillable = [
        'stockId',
        'productId',
        'stockName',
        'batchNumber',
        'quantityReceived',
        'quantitySold',
        'quantityTransferred',
        'quantityExpired',
        'quantityDamaged',
        'expiryDate',
        'hospitalId',
        'receivedBy',
        'status',
        'isActive',
        'landedCost',
        'resilienceMarkup',
        'distributorMarkup',
        'hospitalMarkup',
        'bankCharges',
        'priceToPatient',
    ];
    protected $primaryKey = 'stockId';

    public function requisition_item()
    {
        return $this->belongsTo(RequisitionItem::class, 'productId', 'productId');
    }

 

    public function received_by()
    {
        return $this->belongsTo(User::class, 'receivedBy', 'id');
    }
}
