<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    public $table = 'transactions';
    protected $fillable = [
        'transactionId',
        'transactionNumber',
        'transactionType',
        'userId',
        'totalAmount',
        'productId',
        'createdBy',
        'paymentMethod',
        'totalAmount',
        'hospitalId',
        'status',
        'approvedBy',
        'approvedAt',
        'patientId',
    ];
    protected $primaryKey = 'transactionId';

    public function products()
    {
        return $this->belongsTo(Products::class, 'productId', 'productId');
    } 

    public function stock()
    {
        return $this->belongsTo(HospitalStock::class, 'stockId', 'stockId');
    } 

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospitalId', 'hospitalId');
    }

    public function transaction_items()
    {
        return $this->hasMany(TransactionItems::class, 'transactionId', 'transactionId');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'createdBy', 'id');
    }

       public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approvedBy', 'id');
    }
    
    public function patient_details()
    {
        return $this->belongsTo(Patient::class, 'patientId', 'patientId');
    }


}
