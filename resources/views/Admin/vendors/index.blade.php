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
            <h2 class="title-1 m-b-25">Stores(Vendors)</h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning scroll-horizontal">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Mobile</th>
                            <th>Main Categories</th>
                            <th>Status</th>
                            <th>Update</th>
                            <th>Delete</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($Vendors)
                            @foreach ($Vendors as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td><img src="{{$data->logo}}" alt="Store" width="50px" height="50px"></td>
                                <td>{{$data->mobile}}</td>
                                <td>{{$data->category->name}}</td>
                                {{-- public function category() --}}
                                <td>{{$data->getActive()}}</td>
                                <td><a class="btn btn-primary" href="{{route('admin.vendors.edit',$data->id)}}">Update</a></td>
                                <td><a class="btn btn-danger" href="{{route('admin.vendors.delete',$data->id)}}">Delete</a></td>
                                <td><a class="btn btn-warning text-white" href="{{route('admin.vendors.status',$data->id)}}">
                                @if($data->active == 1)  
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
                            {{$Vendors->links()}}
                        {{-- End Display Pagination --}}
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
  


@endsection