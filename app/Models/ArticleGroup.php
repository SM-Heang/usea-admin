<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleGroup extends Model
{
    use HasFactory;
    protected $primaryKey = 'group_id';
    protected $table = 'usea_article_group';
    protected $fillable = ['group_title_en', 'group_title_kh'];
}
