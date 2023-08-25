<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'email_verified_at', 'remember_token', 'create_at', 'update_at'];

    public function article(){
        return $this->hasMany(Article::class);
    }
    public function event(){
        return $this->hasMany(Event::class);
    }
    public function partnership(){
        return $this->hasMany(Partnership::class);
    }
    public function major(){
        return $this->hasMany(Major::class);
    }
    public function faculty(){
        return $this->hasMany(Faculty::class);
    }
    public function subject(){
        return $this->hasMany(Subject::class);
    }
    //study-year
    public function year(){
        return $this->hasMany(StudyYear::class);
    }
    public function semester(){
        return $this->hasMany(Semester::class);
    }
    public function studyplan(){
        return $this->hasMany(StudyPlan::class);
    }

}
