<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\languageRequest;
use Illuminate\Pagination\PaginationServiceProvider;

class LanguagesController extends Controller
{
    public function index(){
        $languages = Language::select()->paginate(PAGINATION_COUNT);
        return view('Admin.languages.index',compact('languages'));
    }

    public function create(){
        return view('Admin.languages.create');
    }

    public function store(languageRequest $request){
        // return $request->except('_token'); 
        // except : Note this is not save to database like token i don't want save from database 
        try{
            Language::create($request->except('_token'));
            return redirect()->Route('admin.languages')->with(['success' => 'saved information successfully !']);
        }catch(\Exception $ex){
            return redirect()->Route('admin.languages')->with(['error' => 'saved Faild error process !']);
        }
    }

    public function edit($id){
        $languages = Language::select()->find($id);
        if(!$languages){
            return redirect()->Route('admin.languages')->with(['error' => 'Not Found Value']);
        }
        return view('Admin.languages.edit',compact('languages'));
    }

    public function update($id , languageRequest $request){
        
        try{
            $languages = Language::find($id);
            if(!$languages){
                return redirect()->route('Admin.languages.edit',$id)->with(['error' => 'Not Found Value']);
            }

            // $languages->update([]);
            $languages->update($request -> except('_token'));
            return redirect()->Route('admin.languages')->with(['success' => 'Updated Successfully !']);

        }catch(\Exception $ex){
            return redirect()->Route('admin.languages')->with(['error' => 'Updated Faild error process !']);
        }   
        
    }

    public function destroy($id){
        
        try{
            $languages = Language::find($id);
            if(!$languages){
                return redirect()->route('Admin.languages',$id)->with(['error' => 'Not Found Value']);
            }

            $languages->delete();
            return redirect()->Route('admin.languages')->with(['success' => 'Delete Successfully !']);

        }catch(\Exception $ex){
            return redirect()->Route('admin.languages')->with(['error' => 'Delete Faild error process !']);
        }   
    }
        
}
