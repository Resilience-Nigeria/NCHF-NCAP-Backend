<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItems extends Model
{
    use HasFactory;

    public $table = 'transaction_items';
    protected $fillable = [
        'transactionId',
        'productId',
        'soldBy',
        'unitPrice',
        'subTotal',
        'quantity',
        'stockId',
        'landedCost',
        'resilienceMarkup',
        'distributorMarkup',
        'hospitalMarkup',
        'bankCharges',
        'priceToPatient',
    ];
    protected $primaryKey = 'itemId';

    public function products()
    {
        return $this->belongsTo(Products::class, 'productId', 'productId');
    } 

    public function stock()
    {
        return $this->belongsTo(HospitalStock::class, 'stockId', 'stockId');
    } 
}
