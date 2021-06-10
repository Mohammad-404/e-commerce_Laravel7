<?php

namespace App\Http\Controllers\Admin;

use App\models\MainCategory;
use App\models\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Config;
use App\Http\Requests\MainCategoryRequest;
use Illuminate\Support\Facades\DB;


class MainCategoriesController extends Controller
{
    public function index(){
        $deafult_lang           = get_language_deafult(); 
        $main_categories        = MainCategory::where('translation_lang',$deafult_lang)->selection()->paginate(PAGINATION_COUNT);         
        return view('Admin.maincategories.index',compact('main_categories'));
    }

    public function create(){
        return view('Admin.maincategories.create');
    }


    public function store(MainCategoryRequest $request){
        //Note convert array to collection
        //$main_category = $request->category; now convert to collection use collect();
        //now use filter, filiter is return data i'am seleccted like i need give english data deafult
        //$value in function like array {} , {} , {} -> {} this is value
        //save the first value is English language
        //return array i use [0] return now index first array value
        //[{"name":"MAN","translation_lang":"en","active":"1"}] without key
        // return $filter; // return like with key {"1":{"name":"MAN","translation_lang":"en","active":"1"}}
        //like create i want using insertGetId === create
        
        try{
            $main_category = collect($request->category);
            $filter = $main_category->filter(function($value,$key){
                return $value['translation_lang'] == get_language_deafult();
            });
            $deafult_category = array_values($filter->all())[0]; 

            $filePath = "";
            if($request -> has('photo')){ //hal find image from request??
                $filePath = uploadImage('maincategories' , $request->photo);
            }

            DB::beginTransaction(); //begin save all rows ..getid..

            $deafult_category_id = MainCategory::insertGetId([ //return ID row
                'name'              => $deafult_category['name'],
                'translation_lang'  => $deafult_category['translation_lang'],
                'translation_of'    => 0,
                'slug'              => $deafult_category['name'],
                'photo'             => $filePath
            ]);

            $categories = $main_category->filter(function($value,$key){
                return $value['translation_lang'] != get_language_deafult();
            });

            if(isset($categories) && $categories->count()){
                $categories_arr = [];
                foreach($categories as $category){
                    $categories_arr[] = [
                        'name'              => $category['name'],
                        'translation_lang'  => $category['translation_lang'],
                        'translation_of'    => $deafult_category_id,
                        'slug'              => $category['name'],
                        'photo'             => $filePath
                    ];
                }
                MainCategory::insert($categories_arr);
            }
            DB::commit(); //save all rows done
            return redirect()->route('admin.maincategories')->with(['success' => 'Saved Successfuly !!']);

        }catch(\Exception $ex){
            DB::rollback(); // no execute save any data to db
            return redirect()->route('admin.maincategories')->with(['error' => 'Faild !!']);
        }
    }

    


}

