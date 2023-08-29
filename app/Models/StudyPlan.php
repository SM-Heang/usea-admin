<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudyPlan extends Model
{
    
    protected $table = 'usea_study_plan';
    protected $primaryKey = 'study_plan_id';
    protected $fillable = ['fac_icon', 'fac_name', 'major_name', 'education_name','major_info','study_year','semester_name','subject_name','study_hour','credit'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(Users::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_name', 'major_id');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'fac_name', 'fac_id');
    }

    public function studyYear()
    {
        return $this->belongsTo(StudyYear::class, 'study_year', 'study_year_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_name', 'semester_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_name', 'subject_id');
    }

    public function degree()
    {
        return $this->belongsTo(Degree::class, 'education_name', 'degree_id');
    }

    public function facicon()
    {
        return $this->belongsTo(Fac_icon::class, 'fac_icon', 'icon_id');
    }

}
