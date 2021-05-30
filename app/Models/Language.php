<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Language extends Model
{
    use Notifiable; //using to send Notifications


    protected $table = "languages";
    
        
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','abbr','locale','name','direction','active','created_at','updated_at'
    ];
    
    /*** Start not function important ***/
    public function scopeActive($query){
        return $query -> where('active',1);
    }

    public function scopeSelection($query){
        return $query->select('id','name','abbr','direction','active');
    }
    /*** End not function important ***/


    public function getActive(){
        return $this->active == 1 ? 'Item Is Active' : 'Item Is Not Active';
    }


    // public function getActiveAttribute($val){
    //     return $val == 1 ? 'Item Is Active' : 'Item Is Not Active';
    // }
    
    // public function getDirectionAttribute($val){
    //     return $val == 'rtl' ? 'Right to left' : 'Left to Right';
    // }

}
