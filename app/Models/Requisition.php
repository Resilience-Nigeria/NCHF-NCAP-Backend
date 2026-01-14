<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    use HasFactory;

    public $table = 'requisitions';
    protected $fillable = [
        'requisitionNumber',
        'requisitionId',
        'hospitalId',
        'totalCost',
        'requestedBy',
        'status',
        'remarks'
    ];
    protected $primaryKey = 'requisitionNumber';

   public function requisition_items()
{
    return $this->hasMany(RequisitionItem::class, 'requisitionId', 'requisitionId');
}


  public function items()
{
    return $this->hasMany(RequisitionItem::class, 'requisitionId', 'requisitionId');
}

    public function requestedByUser()
    {
        return $this->belongsTo(User::class, 'requestedBy', 'id');
    }


    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospitalId', 'hospitalId');
    }

    
}
