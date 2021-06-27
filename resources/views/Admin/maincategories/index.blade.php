@extends('layouts.Admin.index')

@section('content')

<div class="container-fluid">
 
    <div class="row">
        <div class="col-lg-12">
            @if (Session::has('success'))
                <div class="alert alert-primary" role="alert">
                    {{Session::get('success')}}
                </div>                
            @endif
            @if (Session::has('error'))
                <div class="alert alert-primary" role="alert">
                    {{Session::get('error')}}
                </div>                
            @endif
            <h2 class="title-1 m-b-25">Items</h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning scroll-horizontal">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Language</th>
                            <th>State</th>
                            <th>Update</th>
                            <th>Delete</th>
                            <th>State</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @isset($main_categories)                            
                            @foreach ($main_categories as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td><img src="{{asset("$item->photo")}}" width="50px" height="50px"></td>
                                    <td>{{$item->translation_lang}}</td>
                                    <td>{{$item->getActive()}}</td>
                                    <td><a class="btn btn-primary" href="{{Route('admin.maincategories.edit',$item->id)}}" >Update</a></td>
                                    <td><a class="btn btn-danger" href="{{Route('admin.maincategories.delete',$item->id)}}" >Delete</a></td>
                                    <td><a class="btn btn-dark" href="{{route('admin.maincategories.status',$item->id)}}" >
                                       @if($item->active == 1)  
                                            Activated
                                        @else 
                                            Deactive
                                       @endif
                                    </a></td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                    <tfoot>
                        {{-- Start Display Pagination --}}
                            {{$main_categories->links()}}
                        {{-- End Display Pagination --}}
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
  


@endsection