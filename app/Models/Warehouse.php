<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    public $table = 'warehouses';
    protected $primaryKey = 'warehouseId';
    protected $fillable = ['warehouseName', 'warehouseLocation', 'distributor', 'manufacturer', 'status'];

    public function distributor()
    {
        return $this->belongsTo(Distributors::class, 'distributor', 'distributorId');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturers::class, 'manufacturer', 'manufacturerId');
    }
}
