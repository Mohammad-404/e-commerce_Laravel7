<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MainCategory extends Model
{
    use Notifiable; //using to send Notifications


    protected $table = "main_categories";
    
        
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','translation_lang','translation_of','name','slug','photo','active','created_at','updated_at'
    ];

    public function scopeActive($query){
        return $query -> where('active',1);
    }

    public function getActive(){
        return $this->active == 1 ? 'Active Item' : 'Not Active Item';
    }

    public function scopeSelection($query){
        return $query->select('id','translation_lang','translation_of','name','slug','photo','active');
    }

    public function categories(){
        return $this -> hasMany(self::class , 'translation_of');
    }
}
