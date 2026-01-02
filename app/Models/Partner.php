<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public $table = 'partners';
    protected $primaryKey = 'partnerId';
    protected $fillable = [
        'partnerId', 'partnerName'
    ];


}
