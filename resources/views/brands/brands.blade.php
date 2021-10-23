@extends('layouts.layout')

@section('title', 'Каталог - ShafikovShop')

@section('content')
    <section class="catalog py-5" style="">
        <div class="container ">
               
         
            <h4 class="mb-4 catalog-title">Бренды</h4>
            <div class="wrapper" style="margin-bottom: 50px">
              @foreach ($data->all() as $el)
                <div class="card item-card" >
                  <input class="d-none" name="category_id" type="text" readonly value="{{$el->id}}">
                  <a class="card-container" href="{{ Route('brand', $el->slug) }}">
                  <img src="{{ asset('public/storage/' . $el->img) }}" class="card-img-top" alt="...">
                  
                  <div class="card-body d-flex justify-content-center">
                     <div class="card-title " style="">{{ $el->name }}</div>
                  </div>
               
                </a>
                </div>
              @endforeach
                
                
        </div>
   
    </section>

@endsection