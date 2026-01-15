<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
class Patient extends Model
{
    use HasFactory;
    // use SoftDeletes;
    public $table = 'patients';
    protected $primaryKey = 'id';
    protected $fillable = [
    'firstName', 
    'lastName', 
    'otherNames', 
    'religion', 
    'gender', 
    'bloodGroup', 
    'address', 
    'occupation', 
    'hospitalFileNumber', 
    'dateOfBirth', 
    'doctor', 
    'status', 
    'hmo', 
    'hmoNumber',
    'nin', 
    'chfId',
    'userId',
    'cancer',
    'doctor',
    'dateOfBirth',
    'nextOfKinName',
    'nextOfKinAddress',
    'nextOfKinPhoneNumber',
    'nextOfKinRelationship',
    'nextOfKinEmail',
    'nextOfKinOccupation',
    'nextOfKinGender',
    'hospital',
    'stateOfOrigin',
    'stateOfResidence',
    'doctorId', 
    'phoneNumber', 
    'patientId',
    'hospitalId',
    'email',
    'diseaseType'
];
    // protected $dates = ['deleted_at'];


    public function doctor()
    {
        return $this->hasOne(Doctors::class, 'doctorId', 'doctorId'); 
    }

    public function hmo()
    {
        return $this->belongsTo(HMOs::class, 'hmo', 'hmoId'); 
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospitalId', 'hospitalId'); 
    }


    public function stateOfOrigin()
    {
        return $this->belongsTo(State::class, 'stateOfOrigin', 'stateId'); 
    }

     public function stateOfResidence()
    {
        return $this->belongsTo(State::class, 'stateOfResidence', 'stateId'); 
    }

    public function cancer()
    {
        return $this->belongsTo(Cancer::class, 'diseaseType', 'cancerId'); 
    }

    public function user(){
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    // public function status(){
    //     return $this->hasOne(ApplicationReview::class, 'patientUserId', 'userId')->orderBy('statusId', 'desc');
    // }

    public function status(){
        return $this->hasOne(ApplicationReview::class, 'patientUserId', 'userId')->latest('reviewId');
    }
    
    public function doctor_assessment(){
        return $this->hasOne(DoctorAssessment::class, 'patientUserId', 'userId')->latest('assessmentId');
    }

    public function social_welfare_assessment(){
        return $this->hasOne(SocialWelfareAssessment::class, 'patientUserId', 'userId')->latest('assessmentId');
    }

    public function mdt_assessment(){
        return $this->hasOne(MDTAssessment::class, 'patientUserId', 'userId')->latest('assessmentId');
    }

    public function cmd_assessment(){
        return $this->hasOne(CMDAssessment::class, 'patientUserId', 'userId')->latest('assessmentId');
    }


    public function nicrat_assessment(){
        return $this->hasOne(NICRATAssessment::class, 'patientUserId', 'userId')->latest('assessmentId');
    }

public function latestStatus()
{
    return $this->hasOne(ApplicationReview::class, 'patientUserId', 'userId')
                ->latestOfMany('created_at');
}


}
