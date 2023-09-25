<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $table = 'usea_career';
    protected $primaryKey = 'career_id';
    protected $fillable = ['career_img', 'career_position_en', 'career_position_kh', 'career_organization_en', 'career_organization_kh', 'career_detail_img', 'career_detail_en', 'career_detail_kh' , 'location_en', 'location_kh', 'expire_date', 'keyword'];
    public function user(){
        return $this->belongsTo(Users::class);
    }
}
