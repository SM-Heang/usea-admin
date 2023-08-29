<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'usea_faculty';
    protected $primaryKey = 'fac_id';
    protected $fillable = ['fac_name_en', 'fac_name_kh', 'user_id', 'created_at', 'updated_at'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(Users::class);
    }
    public function majors()
    {
        return $this->hasMany(Major::class, 'fac_id');
    }
    public function studyPlans()
    {
        return $this->hasMany(StudyPlan::class, 'fac_name', 'fac_id');
    }
    public function facicon()
    {
        return $this->hasMany(Fac_icon::class, 'fac_name_en', 'fac_id');
    }
}
