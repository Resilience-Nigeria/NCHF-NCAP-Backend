<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturers extends Model
{
    use HasFactory;
    public $table = 'manufacturers';
    protected $fillable = [
    'manufacturerId',
    'manufacturerName',
    ];

     protected $primaryKey = 'manufacturerId';

  
     public function map()
    {
        return $this->hasMany(DistributorsMap::class, 'distributorFor', 'manufacturerId');
    }
}
