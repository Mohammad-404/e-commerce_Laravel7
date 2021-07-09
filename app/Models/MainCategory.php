<?php

namespace App\Models;

use App\Observers\MainCategoryObserve;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use SplObserver;

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

    // Connection Observe With Models
    protected static function boot(){
        parent::boot();
        MainCategory::observe(MainCategoryObserve::class);
    }

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

    public function subCategories(){
        return $this->hasMany('App\Models\SubCategory', 'category_id' ,'id');
    }

    //many to one relation tow tabels vendors and categories
    public function vendors(){
        return $this -> hasMany('App\Models\Vendor' , 'category_id' , 'id'); //one forignkey and two primary key
    } 

    public function scopeDeafultCategory($query){
        return $query -> where('translation_of',0);
    }


}
