<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DrugRequest extends Model
{
    use HasFactory;

    protected $primaryKey = 'requestId';

    protected $fillable = [
        'requestNumber',
        'productPriceId',
        'quantityRequested',
        'quantityApproved',
        'quantityReceived',
        'quantityDamaged',
        'expiryDate',
        'hospitalId',
        'requestedBy',
        'approvedBy',
        'receivedBy',
        'status',
    ];

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class, 'hospitalId', 'hospitalId');
    }

    public function requestedByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requestedBy', 'id');
    }

    public function approvedByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approvedBy', 'id');
    }

    public function receivedByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receivedBy', 'id');
    }

    public function product_price_list(): BelongsTo
    {
        return $this->belongsTo(ProductPriceList::class, 'productPriceId', 'id');
    }
}