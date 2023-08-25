<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'usea_semester';
    protected $primaryKey = 'semester_id';
    protected $fillable = ['semester_name_en', 'semester_name_kh', 'updated_at', 'created_at', 'user_id'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(Users::class);
    }

    public function studyPlans()
    {
        return $this->hasMany(StudyPlan::class, 'semester_name', 'semester_id');
    }

}
