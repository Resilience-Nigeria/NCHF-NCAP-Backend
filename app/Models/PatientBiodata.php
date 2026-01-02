<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientBiodata extends Model
{
    use HasFactory;
    public $table = 'patients';
    protected $fillable = [
        'patientId',
        'NIN',
        'userId',
        'chfId',
        'hospitalFileNumber',
        'hospital',
        'stateOfOrigin',
        'lgaOfOrigin',
        'stateOfResidence',
        'lgaOfResidence',
        'phoneNumber',
        'email',
        'gender',
        'bloodGroup',
        'occupation',
        'dateOfBirth',
        'address',
        'nextOfKinName',
        'nextOfKinAddress',
        'nextOfKinPhoneNumber',
        'nextOfKinEmail',
        'nextOfKinRelationship',
        'nextOfKinOccupation',
        'nextOfKinGender',
        'hmo',
        'cancer',
        'doctor',
        'status',
    ];
    protected $primaryKey = 'patientId';

   public function hospital(){
        return $this->belongsTo(Hospital::class, 'hospital', 'hospitalId');
    }

    public function stateOfOrigin(){
        return $this->belongsTo(State::class, 'stateOfOrigin', 'stateId');
    }

    public function lgaOfOrigin(){
        return $this->belongsTo(Lgas::class, 'lgaOfOrigin', 'lgaId');
    }

    public function stateOfResidence(){
        return $this->belongsTo(State::class, 'stateOfResidence', 'stateId');
    }

    public function lgaOfResidence(){
        return $this->belongsTo(Lgas::class, 'lgaOfResidence', 'lgaId');
    }

    public function hmo(){
        return $this->belongsTo(HMOs::class, 'hmoId', 'hmoId');
    }

    public function cancer(){
        return $this->belongsTo(Cancer::class, 'cancerType', 'cancerId');
    }

    public function doctor(){
        return $this->belongsTo(Doctors::class, 'doctor', 'doctorId');
    }

    public function user(){
        return $this->belongsTo(User::class, 'userId', 'id');
    }



}
