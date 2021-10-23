@extends('layouts.layout')

@section('title', 'BrandName')

@section('content')
<section class="item pt-5">
    <div class="container">
        <div class="row item-header">
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <img class="img_contact" src="{{ asset('public/storage/'.$data->img)}}" height="200px" width="auto" alt="">
            </div>
            <div class="col-12 col-md-6 d-flex align-items-center flex-column">
           
                <h4 name='name' class="mb-5">{{$data->name}}</h4>
                <div class="d-flex align-self-end mb-3">
                    <ul class="navbar-nav">
                        @foreach ($categories as $category)
                            <li><a href="{{ Route('goods', [(App\Models\Category::where('id', $category->category_id)->first())->slug, $category->slug]) }}?brand={{$data->id}}">{{$category->name}} {{$data->name}}</a></li>
                        @endforeach
                        @foreach ($categories2 as $category)
                            @php
                                $subcategory = App\Models\Subcategory::where('id', $category->subcategory_id)->first();
                            @endphp

                            <li><a href="{{ Route('goods', [(App\Models\Category::where('id', $subcategory->category_id)->first())->slug, $category->slug]) }}?brand={{$data->id}}">{{$category->name}} {{$data->name}}</a></li>
                        @endforeach
                    </ul>
                   
                </div>
                <p></p>
            </div>   
        </div>
    </div>
</section>
<section class="item-desc pt-5">
    <div class="container">
        <div class="row item-desc-body">
            <div class="row description ">
               @php echo $data->description @endphp
            </div>
         </div>
    </div>
</section>
@endsection