<?php

namespace App\Http\Controllers\Admin;

use App\models\MainCategory;
use App\models\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Config;

class MainCategoriesController extends Controller
{
    public function index(){
        $deafult_lang           = get_language_deafult(); 
        $main_categories        = MainCategory::where('translation_lang',$deafult_lang)->selection()->paginate(PAGINATION_COUNT);         
        // return view('Admin.maincategories.index',compact('main_categories'));
        return view('Admin.maincategories.index',['main_categories' => $main_categories]);
    }

    public function create(){
        $lang                   = Language::active()->select('abbr')->get();
        return view('Admin.maincategories.create',compact('lang'));
    }

    public function store(){
        
    }
    

}
