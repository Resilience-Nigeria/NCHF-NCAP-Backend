<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    use HasFactory;

    public $table = 'languages';
    protected $fillable = [
        'languageId',
        'languageName',
    ];
    protected $primaryKey = 'languageId';


    public function enrolled_by()
    {
        return $this->belongsTo(User::class, 'enrolledBy', 'id');
    }



}
