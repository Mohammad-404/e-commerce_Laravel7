<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\SubCategory;
use App\Http\Requests\SubCategoriesRequest;

class SubCategoriesController extends Controller
{
    public function index(){
        $SubCategories = SubCategory::selection()->paginate(PAGINATION_COUNT);
        return view('Admin.subcategories.index',compact('SubCategories'));
    }

    public function create(){
        

        return view('Admin.subcategories.create');
    }

}
