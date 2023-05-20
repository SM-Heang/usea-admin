<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipCategory extends Model
{
    use HasFactory;
    protected $primaryKey = 'categories_id';
    protected $table = 'usea_scholarship_categories';
    protected $fillable = ['categories_title_en','categories_title_kh', 'group_id'];
    public function user(){
        return $this->belongsTo(Users::class);
    }
}
