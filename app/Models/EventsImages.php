<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class EventsImages extends Model
{
    use HasFactory;
    protected $primaryKey = 'image_id';
    protected $table = 'usea_events_images';
    protected $fillable = ['images_title', 'images_name', 'images_style'];
    public function event(){
        return $this->belongsTo(Event::class);
    }
}
