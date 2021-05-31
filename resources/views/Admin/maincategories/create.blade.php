@extends('layouts.Admin.index')

@section('content')

<div class="container-fluid">
 
    <div class="row">
        <div class="col-lg-12">
            <h2 class="title-1 m-b-25">Add Main Category</h2>
            <form action="{{Route('admin.languages.store')}}" method="post" enctype="multipart/form-data" class="bg-white p-4">
                @csrf
                <div class="row">
                    <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">Name Category</label>
                    <input type="text" name="name" class="form-control"  placeholder="Name Category">
                    @error('name')
                        <label class="text-danger">{{$message}}</label>
                    @enderror
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="exampleInputPassword1">Translation Language</label>
                        <select name="translation_lang" class="form-control">
                            @foreach ($lang as $item)
                                <option value="{{$item->abbr}}">{{$item->abbr}}</option>
                            @endforeach                        
                        </select>
                        @error('translation_lang')
                            <label class="text-danger">{{$message}}</label>
                        @enderror
                    </div>
                        
                    {{-- <div class="form-group col-lg-6">
                    <label for="exampleInputPassword1">Translation Language</label>
                    <input type="text" name="translation_lang" class="form-control"  placeholder="Translation Language">
                    @error('translation_lang')
                        <label class="text-danger">{{$message}}</label>
                    @enderror
                    </div> --}}

                    <div class="form-group col-lg-6 p-3" style="border:1px solid black">
                        <label for="exampleInputPassword1" class="my-5">Photo Category </label>
                        <input type="file"  id="hdncustom7" name="photo" />

                        @error('photo')
                            <label class="text-danger">{{$message}}</label>
                        @enderror
                    </div>

                    
                    <div class="form-group col-lg-6">
                        <label for="exampleInputPassword1" class="my-5">State Active ?</label>
                        <input type="checkbox" value="1" id="custom7" checked="checked" /> 
                        <input type="hidden" value="1" id="hdncustom7" name="active" />

                        @error('active')
                            <label class="text-danger">{{$message}}</label>
                        @enderror
                    </div>

                    
                    {{-- <div class="form-group col-lg-6">
                    <label for="exampleInputPassword1">Active Language</label>
                    <input type="text" class="form-control"  placeholder="Active Language">
                    </div> --}}
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
              </form>

        </div>
    </div>
  


@endsection