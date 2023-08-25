<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'usea_subject';
    protected $primaryKey = 'subject_id';
    protected $fillable = ['subject_name_en', 'subject_name_kh'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(Users::class);
    }

    public function studyPlans()
    {
        return $this->hasMany(StudyPlan::class, 'subject_name', 'subject_id');
    }
    
}
