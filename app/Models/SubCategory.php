<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SubCategory extends Model
{
    use Notifiable; //using to send Notifications

    
    protected $table = "sub_categories";
    
    protected $fillable = [
        'parent_id','category_id','translation_lang','translation_of','name','slug','photo','active','created_at','updated_at'
    ];
    
    public function scopeSelection($query){
        return $query->select('id','parent_id','category_id','translation_lang','translation_of','name','slug','photo','active');
    }

    public function scopeActive($query){
        return $query -> where('active',1);
    }

    public function mainCategory(){
        return $this->belongsTo('App\Models\MainCategory', 'category_id' ,'id');
    }
    
    public function getphotoAttribute($val){ 
        return ($val !== null) ? asset($val) : "";
    }

    public function getActive(){
        return $this->active == 1 ? 'Active Item' : 'Not Active Item';
    }

  
}
