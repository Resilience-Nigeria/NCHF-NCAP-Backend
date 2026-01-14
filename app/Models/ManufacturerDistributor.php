<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManufacturerDistributor extends Model
{
    use HasFactory;
    public $table = 'manufacturers_suppliers';
    protected $primaryKey = 'id';
    protected $fillable = ['distributor', 'distributorFor'];

  public function supplier()
    {
        return $this->belongsTo(Distributors::class, 'distributor', 'distributorId');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturers::class, 'distributorFor', 'manufacturerId');
    }
}
