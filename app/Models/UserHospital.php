<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHospital extends Model
{
    use HasFactory;
    public $table = 'user_hospital';
    // protected $primaryKey = 'hospitalId';
    protected $fillable = ['userId', 'hospitalId'];

 public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospitalId', 'hospitalId');
    }
}
