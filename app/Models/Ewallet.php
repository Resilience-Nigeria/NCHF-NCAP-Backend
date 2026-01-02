<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ewallet extends Model
{
    use HasFactory;
    public $table = 'e_wallets';
    protected $fillable = ['walletId', 'hospitalId', 'balance', 'comments', 'createdBy', 'lastUpdatedBy'];
    protected $primaryKey = 'walletId';

   
}
