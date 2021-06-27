<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vendor extends Model
{
    use Notifiable; //using to send Notifications


    protected $table = "vendors";
        
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','logo','mobile','address','email','category_id','active','password','created_at','updated_at'
    ];

    protected $hidden = ['category_id','password'];
    
    public function scopeActive($query){
        return $query -> where('active' , 1);
    }

    public function getLogoAttribute($val){ //get...Attribute recevedword
        return ($val !== null) ? asset($val) : "";
    }

    public function scopeSelection($query){
        return $query->select('id','name','address','logo','mobile','email','category_id','active','password');
    }

    public function getActive(){
        return $this->active == 1 ? "Item is Active" : "Item is Not Active"; 
    }

    //one to many belongsTo
    public function category(){
        return $this -> belongsTo('App\Models\MainCategory','category_id' , 'id');  
    }

    public function setPasswordAttribute($password){
        if(!empty($password)){
            $this->attributes['password'] = bcrypt($password);
        }
    }

}
