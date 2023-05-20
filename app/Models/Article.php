<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Article extends Model
{
   
    use HasFactory;
    protected $primaryKey = 'article_id';
    protected $table = 'usea_article';
    protected $fillable = ['article_title_en', 'article_title_kh', 'article_description_en', 'article_description_kh', 'categories_id', 'keywords', 'sitemap'];

    public function user(){
        return $this->belongsTo(Users::class);
    }
    public function articleCategory(): HasOne
    {
        return $this->hasOne(ArticleCategory::class);
    }
}
