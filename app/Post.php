<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'publshed_at',
        'category_id',
        'slug'

    ];
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public static function getDate($d, $format ='l j F'){
        if ($d){
        $date = Carbon::createFromFormat('Y-m-d H:i:s',$d);
        return $date->format('l j F');
        }
        else{
            return Carbon::now();

        }

    }
    
}
