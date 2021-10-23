@extends('layouts.layout')

@section('title', $category->name.' - ShafikovShop')
 
 



@section('content')
<section class="navigate">
  <div class="container">
    
    @if(isset($subcategory)) 
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{Route('catalog')}}">Каталог товаров</a></li>
        <li class="breadcrumb-item"><a href="{{Route('subcatalog', $category->slug)}}">{{$category->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$subcategory->name}}</li>
      </ol>
    </nav>
    @else
      <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{Route('catalog')}}">Каталог товаров</a></li>
          <li class="breadcrumb-item"><a href="{{Route('subcatalog', $category->slug)}}">{{$category->name}}</a></li>
          
        </ol>
      </nav>
    @endif
  </div>
</section>
<section class="catalog py-5" style="">
    <div class="container ">
      @if(isset($subcategory)) 
      <h4 class="mb-4">{{$subcategory->name }}</h4>
        @else
        <h4 class="mb-4">{{$category->name }}</h4>
      @endif
       
        <div class="wrapper" style="margin-bottom: 50px">
          @foreach ($data->all() as $el)
                  <div class="card item-card" >
                    @if (method_exists($el, 'subcategories'))
                    @if($el->subcategories()->exists())
                    <a class="card-container" href="{{ Route('subcatalog2', [$category->slug, $el->slug]) }}">
                    @else
                      <a class="card-container" href="{{ Route('goods', [$category->slug, $el->slug]) }}">
                    @endif
                    @else
                     <a class="card-container" href="{{ Route('goods', [$category->slug, $el->slug]) }}">
                    @endif
                      
                    <img src="{{ asset('public/storage/' . $el->img) }}" class="card-img-top" alt="...">
                    
                    <div class="card-body d-flex justify-content-center">
                      <div class="card-title " style="">{{$el->name}} </div>
                    </div>
                
                  </a>
                  </div>

                  
               
          @endforeach
            
            
    </div>

</section>
@endsection