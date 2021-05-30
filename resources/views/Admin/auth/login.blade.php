@extends('layouts.Admin.login')

@section('title','Login Admin')

@section('content')
    
<div class="login-form">
   
    @include('Front.include.aleart_faild')
    
    <form action="{{Route('admin.login')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Email Address</label>
            <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
            @error('email')
                <h6 style="color:red;">{{$message}}</h6>
            @enderror
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
            @error('password')
                <h6 style="color:red;">{{$message}}</h6>
            @enderror
        </div>
        <div class="login-checkbox">
            <label>
                <input type="checkbox" name="remember">Remember Me
            </label>
            <label>
                <a href="#">Forgotten Password?</a>
            </label>
        </div>
        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
    </form>
    {{-- <div class="register-link">
        <p>
            Don't you have account?
            <a href="#">Sign Up Here</a>
        </p>
    </div> --}}
</div>

@endsection
