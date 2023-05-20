<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyTour extends Model
{
    protected $table = 'usea_study_tour';
    protected $primaryKey = 'tour_id';
    protected $fillable = ['tour_title', 'tour_date', 'tour_style', 'tour_title_kh'];
    use HasFactory;
}
