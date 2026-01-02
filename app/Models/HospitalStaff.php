<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalStaff extends Model
{
    use HasFactory;

    public $table = 'hospital_staff';
    protected $fillable = [
        'hospitalId',
        'userId',
    ];

 public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospitalId', 'hospitalId');
    } 

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
