<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyTourImages extends Model
{
    protected $table = 'usea_study_tour_images';
    protected $primaryKey = 'image_id';
    protected $fillable = ['images_name', 'images_title', 'images_title_kh', 'images_style'];
    use HasFactory;
}
