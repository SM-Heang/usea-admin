<?php

namespace App\Models;
use App\Models\StudyPlan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $table = 'usea_major';
    protected $primaryKey = 'major_id';
    protected $fillable = ['major_name_en', 'major_name_kh', 'fac_id','user_id', 'updated_at', 'major_info_en', 'major_info_kh'];
    use HasFactory;

    public function plans()
    {
        return $this->belongsToMany(StudyPlan::class , 'study_plan_major');
    }
    
    public function user(){
        return $this->belongsTo(Users::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'fac_id');
    }

    public function studyPlans()
    {
        return $this->hasMany(StudyPlan::class, 'major_name', 'major_id');
    }
}
