<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManufacturerStaff extends Model
{
    use HasFactory;
    public $table = 'manufacturer_staff';
    protected $primaryKey = 'id';
    protected $fillable = ['manufacturerId', 'staffId'];

  public function manufacturer()
    {
        return $this->belongsTo(Manufacturers::class, 'manufacturerId', 'manufacturerId');
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'staffId', 'id');
    }
}
