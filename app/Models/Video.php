<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Video extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','description','youtube_id','thumbnail','publish'
    ];

    public function getCreatedAtAttribute(){

        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }

    public static function  all_video(){
        $data=self::orderBy('updated_at','DESC')->get();

       /*  $vidio=array();
        foreach($data as $r){
            $youtube=Youtube::getVideoInfo($r['youtube_id']);
            $r['thumbnails']=$youtube->snippet->thumbnails
            $vidio[]=$r;

        } */

        return $data;
    }
}
