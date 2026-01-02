<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributorsMap extends Model
{
    use HasFactory;
    public $table = 'distributors_map';
    protected $fillable = [
    'distributorId',
    'distributorFor',
    ];

     protected $primaryKey = 'mapId';

     public function distributors()
    {
        return $this->belongsTo(Distributors::class, 'distributorId', 'distributorId');
    }

    public function manufacturers()
    {
        return $this->belongsTo(Manufacturers::class, 'distributorFor', 'manufacturerId');
    }
}
