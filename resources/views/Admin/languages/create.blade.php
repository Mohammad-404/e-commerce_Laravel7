@extends('layouts.Admin.index')

@section('content')

<div class="container-fluid">
 
    <div class="row">
        <div class="col-lg-12">
            <h2 class="title-1 m-b-25">Add Languages</h2>
            <form action="{{Route('admin.languages.store')}}" method="post" enctype="multipart/form-data" class="bg-white p-4">
                @csrf
                <div class="row">
                    <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">Name Language</label>
                    <input type="text" name="name" value="{{old("name")}}" class="form-control"  placeholder="Name Language">
                    @error('name')
                        <label class="text-danger">{{$message}}</label>
                    @enderror
                    </div>
                    <div class="form-group col-lg-6">
                    <label for="exampleInputPassword1">Abbr Language</label>
                    <input type="text" name="abbr" value="{{old("abbr")}}" class="form-control"  placeholder="Abbr Language">
                    @error('abbr')
                        <label class="text-danger">{{$message}}</label>
                    @enderror
                    </div>

                    <div class="form-group col-lg-6">
                    <label for="exampleInputPassword1">Direction Language</label>
                    <select name="direction" class="form-control">a
                        <option value="rtl">Right To Left</option>
                        <option value="ltr">Left To Right</option>
                    </select>
                    @error('direction')
                        <label class="text-danger">{{$message}}</label>
                    @enderror
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="exampleInputPassword1" class="my-5">State Active ?</label>
                        <input type="checkbox" value="1" name="active" checked="checked" /> 

                        {{-- <input class="my-5" type="checkbox" name="active" checked> --}}
                        {{-- <input type="checkbox" value="1" id="custom7" checked="checked" /> 
                        <input type="hidden" value="1" id="hdncustom7" name="active" /> --}}

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