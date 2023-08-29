<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fac_icon extends Model
{
    protected $table = 'usea_faculty_icon';
    protected $primaryKey = 'icon_id';
    protected $fillable = ['icon_name', 'fac_name','user_id', 'updated_at', 'created_at'];
    use HasFactory;

    public function studyPlans()
    {
        return $this->hasMany(StudyPlan::class, 'fac_icon', 'icon_id');
    }

    public function facultys(){
        return $this->belongsTo(Faculty::class ,'fac_name_en', 'fac_id');
    }
}
