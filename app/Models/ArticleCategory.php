<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArticleCategory extends Model
{
    use HasFactory;
    protected $table = 'usea_article_categories';
    protected $primaryKey = 'categories_id';
    protected $fillable = ['categories_title_en', 'categories_title_kh', 'group_id'];
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
    public function user(){
        return $this->belongsTo(Users::class);
    }
}
