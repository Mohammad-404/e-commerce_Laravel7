<?php

namespace App\Http\Controllers\Admin;

use App\models\MainCategory;
use App\models\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Config;
use App\Http\Requests\MainCategoryRequest;

class MainCategoriesController extends Controller
{
    public function index(){
        $deafult_lang           = get_language_deafult(); 
        $main_categories        = MainCategory::where('translation_lang',$deafult_lang)->selection()->paginate(PAGINATION_COUNT);         
        return view('Admin.maincategories.index',['main_categories' => $main_categories]);
    }

    public function create(){
        return view('Admin.maincategories.create');
    }

    public function store(MainCategoryRequest $request){
        //Note convert array to collection
        //$main_category = $request->category; now convert to collection use collect();
        $main_category = collect($request->category);
        //now use filter, filiter is return data i'am seleccted like i need give english data deafult
        //$value in function like array {} , {} , {} -> {} this is value
        //save the first value is English language
        $filter = $main_category->filter(function($value,$key){
            return $value['translation_lang'] == get_language_deafult();
        });
        return $filter;

        // return $request;
    }   
    

}
