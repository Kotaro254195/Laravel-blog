<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    Use SoftDeletes;

    protected $fillable=["title","content","slug","featured","category_id","user_id"];

    public function deleteImage(){
        Storage::Delete($this->featured);
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tags(){
        return $this->belongsToMany("App\Tag");
    }
    
}
