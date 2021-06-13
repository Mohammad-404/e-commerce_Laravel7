@extends('layouts.Admin.index')

@section('content')

<div class="container-fluid">
 
    <div class="row">
        <div class="col-lg-12">
            <h2 class="title-1 m-b-25">Add Languages</h2>
            <form action="{{Route('admin.languages.update',$languages->id)}}" method="post" enctype="multipart/form-data" class="bg-white p-4">
                @csrf
                <div class="row">
                    <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">Name Language</label>
                    <input type="text" name="name" value="{{$languages->name}}" class="form-control" value=""  placeholder="Name Language">
                    @error('name')
                        <label class="text-danger">{{$message}}</label>
                    @enderror
                    </div>
                    <div class="form-group col-lg-6">
                    <label for="exampleInputPassword1">Abbr Language</label>
                    <input type="text" name="abbr" value="{{$languages->abbr}}" class="form-control"  placeholder="Abbr Language">
                    @error('abbr')
                        <label class="text-danger">{{$message}}</label>
                    @enderror
                    </div>

                    <div class="form-group col-lg-6">
                    <label for="exampleInputPassword1">Direction Language</label>
                    <select name="direction" class="form-control">a
                        <option value="rtl" @if($languages->direction == 'rtl') selected @endif >Right To Left</option>
                        <option value="ltr" @if($languages->direction == 'ltr') selected @endif >Left To Right</option>
                    </select>
                    @error('direction')
                        <label class="text-danger">{{$message}}</label>
                    @enderror
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="exampleInputPassword1" class="my-5">State Active ?</label>
                        <input type="checkbox" value="1" name="active" @if($languages->active == 1) checked="checked" @endif /> 
                        
                        @error('active')
                            <label class="text-danger">{{$message}}</label>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-danger">Update</button>
              </form>

        </div>
    </div>
  


@endsection