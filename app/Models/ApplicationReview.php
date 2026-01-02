<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationReview extends Model
{
    use HasFactory;

    protected $table = 'patient_application_review';

    protected $primaryKey = 'reviewId';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = true; // or false if your table doesn't have them

    protected $fillable = [
        'patientUserId',
        'reviewerId',
        'reviewerRole',
        'statusId',
        'comments',
    ];

    public function status_details()
    {
        return $this->belongsTo(StatusList::class, 'statusId', 'statusId');
    }

     public function user()
    {
        return $this->belongsTo(User::class, 'patientUserId', 'id');
    }
}
