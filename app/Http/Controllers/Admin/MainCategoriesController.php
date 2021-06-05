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
        
        return $request;
    }   
    

}
