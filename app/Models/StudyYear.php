<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyYear extends Model
{
    protected $table = 'usea_study_year';
    protected $primaryKey = 'study_year_id';
    protected $fillable = ['study_year_en', 'study_year_kh', 'user_id', 'created_at', 'updated_at'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(Users::class);
    }

    public function studyPlans()
    {
        return $this->hasMany(StudyPlan::class, 'study_year', 'study_year_id');
    }

}
