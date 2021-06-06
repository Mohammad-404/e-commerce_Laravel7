@extends('layouts.Admin.index')

@section('content')

<div class="container-fluid">
 
    <div class="row">
        <div class="col-lg-12">
            <h2 class="title-1 m-b-25">Add Main Category</h2>
            <form action="{{Route('admin.maincategories.store')}}" method="post" enctype="multipart/form-data" class="bg-white p-4">
                @csrf
                <div class="row">
                    <div class="form-group col-lg-12 p-3" style="border-bottom:1px solid black">
                        <label for="exampleInputPassword1">Photo Category </label>
                        <input type="file"  id="hdncustom7" name="photo" />

                        @error('photo')
                            <label class="text-danger">{{$message}}</label>
                        @enderror
                    </div>

                    @if(get_language() -> count() > 0)
                        @foreach (get_language() as $index => $item)

                        <div class="form-group col-lg-5">
                            {{-- //comment {{__('messages.'.$item->abbr)}} //when translate any data  --}}
                        <label for="exampleInputEmail1">Name Category - {{$item->name}}</label>
                        <input type="text" name="category[{{$index}}][name]" 
                        value="{{ old("category.$index.name") }}" class="form-control"  placeholder="">
                        @error("category.$index.name")
                            <label class="text-danger">The Feild Is Required</label>
                        @enderror
                        </div>
    
                        <div class="form-group col-lg-5">
                            <label for="exampleInputPassword1">Translation Language</label>
                            <select name="category[{{$index}}][translation_lang]" class="form-control">
                                <option value="{{$item->abbr}}">{{$item->abbr}}</option>
                            </select>
                            @error("category.$index.translation_lang")
                            <label class="text-danger">The Feild Is Required</label>
                            @enderror
                        </div>
    
                        
                        <div class="form-group col-lg-2">
                            <label for="exampleInputPassword1" class="my-5">State Active ?</label>
                            <input type="checkbox" value="1" id="custom7" checked="checked" /> 
                            <input type="hidden" value="1" id="hdncustom7" name="category[{{$index}}][active]" />
    
                            @error("category.$index.active")
                                <label class="text-danger">The Feild Is Required</label>
                            @enderror
                        </div>      
                        
                        @endforeach                        
                    @endif

                    {{-- <div class="form-group col-lg-6">
                    <label for="exampleInputPassword1">Translation Language</label>
                    <input type="text" name="translation_lang" class="form-control"  placeholder="Translation Language">
                    @error('translation_lang')
                        <label class="text-danger">{{$message}}</label>
                    @enderror
                    </div> --}}

                </div>
                <button type="submit" class="btn btn-primary">Save</button>
              </form>

        </div>
    </div>
  


@endsection