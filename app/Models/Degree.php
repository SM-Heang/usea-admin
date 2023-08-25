<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $table = 'usea_degree';
    protected $primaryKey = 'degree_id';
    protected $fillable = ['degree_name_en', 'degree_name_kh'];
    use HasFactory;

    public function studyPlans()
    {
        return $this->hasMany(StudyPlan::class, 'education_name', 'degree_id');
    }
}
