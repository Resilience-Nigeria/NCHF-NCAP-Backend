<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributorStaff extends Model
{
    use HasFactory;
    public $table = 'distributor_staff';
    protected $primaryKey = 'id';
    protected $fillable = ['distributorId', 'staffId'];

  
}
