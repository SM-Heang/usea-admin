<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $primaryKey = 'event_id';
    protected $table = 'usea_events';
    protected $fillable = ['event_title_en', 'event_title_kh', 'event_date', 'event_cover', 'event_description_en', 'event_description_kh','event_status','event_style','tags'];

    public function user(){
        return $this->belongsTo(Users::class);
    }
    public function eventImages(): HasMany
    {
        return $this->hasMany(EventsImages::class);
    }
}
