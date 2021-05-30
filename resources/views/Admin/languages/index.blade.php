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
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Appr</th>
                            <th>Direction</th>
                            <th>State</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($languages)                            
                            @foreach ($languages as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->abbr}}</td>
                                    <td>{{$item->direction}}</td>
                                    <td>{{$item->getActive()}}</td>
                                    <td><a class="btn btn-primary" href="{{Route('admin.languages.edit',$item->id)}}" >Update</a></td>
                                    <td><a class="btn btn-danger" href="{{Route('admin.languages.delete',$item->id)}}" >Delete</a></td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                    <tfoot>
                        {{-- Start Display Pagination --}}
                            {{$languages->links()}}
                        {{-- End Display Pagination --}}
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
  


@endsection