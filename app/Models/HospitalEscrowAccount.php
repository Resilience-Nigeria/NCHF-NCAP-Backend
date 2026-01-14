<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalEscrowAccount extends Model
{
    use HasFactory;

    public $table = 'hospital_escrow_accounts';
    protected $fillable = [
        'hospitalId',
        'accountNumber',
        'bankName',
        'accountName',
        
    ];
    protected $primaryKey = 'escrowId';

    protected $hidden = ['created_at', 'updated_at'];
}
