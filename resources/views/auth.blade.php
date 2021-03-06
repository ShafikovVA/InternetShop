@extends('layouts.layout')
@section('title', 'auth')

@section('content')
    {{Session::get('message')}}
    <section class="my-5">
        <div class="container">
          @if ($errors->any())
          <ul class="errors">
            @foreach ($errors->all() as $error)
              <li class="text-danger">{{$error}}</li>
            @endforeach
          </ul>
          @endif
          <form action=" {{ Route('auth') }} " method="POST" class="d-flex flex-column">
            @csrf
              <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <ul class="w-100 d-flex flex-row">
                 
                  <li><a href="{{ Route('registration') }}">Зрегестрироваться</a></li>
                    <li><a href="">Забыли пароль?</a></li> 
                </ul>
          </form>
        </div>
    </section>
@endsection