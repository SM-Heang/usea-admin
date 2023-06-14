<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    use HasFactory;
    protected $primaryKey = 'partnership_id';
    protected $table = 'usea_partnership';
    protected $fillable = ['partnership_title_en', 'partnership_title_kh', 'partnership_description_en', 'partnership_description_kh', 'partnership_type','partnership_link', 'partnership_logo', 'signed_date'];
    public function user(){
        return $this->belongsTo(Users::class);
    }
}
