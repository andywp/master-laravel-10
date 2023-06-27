<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Album extends Model
{
    use HasFactory;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = [
        'album'
    ];

    public function sluggable(): array
    {
        return [
            'album_slug' => [
                'source' => 'album'
            ]
        ];
    }

    public function getCreatedAtAttribute(){

        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }

    public function getUpdatedAtAttribute(){

        return Carbon::parse($this->attributes['updated_at'])->translatedFormat('l, d F Y');
    }

    public function getTanggalPublish(){
        return Carbon::parse($this->attributes['updated_at'])->translatedFormat('Y-m-d'); 
    }

    public function gallery(){
        return $this->hasMany(Gallery::class, 'album_id');
    }

    public function latestGallery(){

        return $this->hasOne(Gallery::class)->latest();
    }
}
