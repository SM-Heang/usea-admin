<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;
    protected $primaryKey = 'scholarship_id';
    protected $table = 'usea_scholarship';
    protected $fillable = ['scholarship_title_en','scholarship_title_kh', 'scholarship_description_en', 'scholarship_description_kh', 'categories_id'];
}
