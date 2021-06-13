@extends('layouts.Admin.index')

@section('content')

<div class="container-fluid">
 
    <div class="row">
        <div class="col-lg-12">
            <h2 class="title-1 m-b-25">Add Main Category</h2>
            <form action="{{route('admin.maincategories.update',$main_categories->id)}}" method="post" enctype="multipart/form-data" class="bg-white p-4">
                @csrf
                <input type="hidden" name="id" value="{{$main_categories->id}}">
                {{-- validation photo --}}
                
                <div class="form-group">
                    <div class="text-center">
                        <img src="{{asset("$main_categories->photo")}}" width="50px" height="50px" alt="Category">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12 p-3" style="border-bottom:1px solid black">
                        <label for="exampleInputPassword1">Photo Category </label>
                        <input type="file" name="photo" />

                        @error('photo')
                            <label class="text-danger">{{$message}}</label>
                        @enderror
                    </div>
                        <div class="form-group col-lg-10">
                        {{-- //comment {{__('messages.'.$item->abbr)}} //when translate any data  --}}
                        <label for="exampleInputEmail1">Name Category - {{$main_categories->name}}</label>
                        <input type="text" name="category[0][name]" 
                        value="{{$main_categories->name}}" class="form-control"  placeholder="">
                        @error("category.0.name")
                            <label class="text-danger">The Feild Is Required</label>
                        @enderror
                        </div>
    
                        <div class="form-group col-lg-2">
                            <label for="exampleInputPassword1" class="my-5">State Active ?</label>
                            <input type="checkbox" value="1" name="category[0][active]" @if($main_categories->active == 1) checked @endif /> 
                            @error("category.0.active")
                                <label class="text-danger">The Feild Is Required</label>
                            @enderror
                        </div>      
                        
                        <div class="form-group col-lg-5 invisible">
                            <label for="exampleInputPassword1">Translation Language</label>
                            <select name="category[0][translation_lang]" class="form-control">
                                <option value="{{$main_categories->translation_lang}}">{{$main_categories->translation_lang}}</option>
                            </select>
                            @error("category.0.translation_lang")
                            <label class="text-danger">The Feild Is Required</label>
                            @enderror
                        </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('admin.maincategories')}}" type="submit" class="btn btn-warning">Cancel</a>
              </form>

        </div>
    </div>
  


@endsection