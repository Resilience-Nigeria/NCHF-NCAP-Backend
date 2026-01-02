<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributors extends Model
{
    use HasFactory;
    public $table = 'distributors';
    protected $fillable = [
    'distributorId',
    'distributorName',
    ];

     protected $primaryKey = 'distributorId';

    public function map()
    {
        return $this->hasMany(DistributorsMap::class, 'distributorId', 'distributorId');
    }
}
