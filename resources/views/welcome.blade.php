@extends('layouts.layout')

@section('title', 'mainpage')

@section('content')
   
    {{Session::get('message')}}
    <section class="new-goods py-5">
        <div class="container">
            <h4 class="mb-4">Популярные флагманы:</h4>
           <div class="slider">
             @foreach ($flagmans as $flagman )
             <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4 d-flex align-items-start" style="padding: 1rem 0">
                    <img src="{{asset('public/storage/'. $flagman->img)}}" class="img-fluid rounded-center col-11" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                        @php
                            $flagmansSubcategory = App\Models\Subcategory::where('id', $flagman['subcategory_id'])->first();
                            $flagmansCategory = App\Models\Category::where('id', $flagmansSubcategory['category_id'])->first();
                        @endphp
                      <h5 class="card-title"><a href="{{Route('good', [$flagmansCategory->slug, $flagmansSubcategory->slug, $flagman->slug])}}">{{$flagman->name}}</a></h5>
                      <p class="card-text">{{number_format($flagman->price,  0, '.',' ')}} ₽</p>
                      
                      </div>
                    </div>
                </div>
              </div>
             @endforeach
            
         
            </div>
        </div>
    </section>

    <section class="new-goods">
        <div class="container">
            <h4 class="mb-4">Новинки:</h4>
            <div class="slider">
                @foreach ($newGoods as $newGood)
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                    <div class="col-md-4 row d-flex align-items-start" style="padding: 1rem 0">
                        <img src="{{asset('public/storage/'.$newGood->img)}}" class="img-fluid rounded-center col-11" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        @php
                            $newsSubcategory = App\Models\Subcategory::where('id', $newGood['subcategory_id'])->first();
                            $newsCategory = App\Models\Category::where('id', $newsSubcategory['category_id'])->first();
                        @endphp
                        <h6 class="card-title"><a href="{{Route('good', [$newsCategory->slug, $newsSubcategory->slug, $newGood->slug])}}">{{$newGood->name}}</a></h6>
                        <p class="card-text">{{number_format($newGood->price, 0, '.',' ')}} ₽</p>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="popular-categories py-5">
        <div class="container">
            <h4 class="mb-4">Популярные категории:</h4>
            <div class="wrapper" style="margin-bottom: 50px">
                <div class="card item-card">
                <input class="d-none" name="category_id" type="text" readonly="" value="1">
                <a class="card-container" href="http://internetshop/catalog/smartfony-i-gadzhety">
                <img src="http://internetshop/public/storage/categories/smartfoni.jpg" class="card-img-top" alt="...">
                
                <div class="card-body d-flex justify-content-center">
                <div class="card-title " style="">Смартфоны и гаджеты</div>
                </div>
            
            </a>
            </div>
                            <div class="card item-card">
                <input class="d-none" name="category_id" type="text" readonly="" value="2">
                <a class="card-container" href="http://internetshop/catalog/noutbuki-i-kompyutery">
                <img src="http://internetshop/public/storage/categories/noutbuki.jpg" class="card-img-top" alt="...">
                
                <div class="card-body d-flex justify-content-center">
                <div class="card-title " style="">Ноутбуки и компьютеры</div>
                </div>
            
            </a>
            </div>
                            <div class="card item-card">
                <input class="d-none" name="category_id" type="text" readonly="" value="3">
                <a class="card-container" href="http://internetshop/catalog/televizory-audio-video-hi-fi">
                <img src="http://internetshop/public/storage/categories/televizori.jpg" class="card-img-top" alt="...">
                
                <div class="card-body d-flex justify-content-center">
                <div class="card-title " style="">Телевизоры, аудио-видео, Hi-Fi</div>
                </div>
            
            </a>
            </div>
                            <div class="card item-card">
                <input class="d-none" name="category_id" type="text" readonly="" value="4">
                <a class="card-container" href="http://internetshop/catalog/bytovaya-tehnika-dlya-doma-i-kuhni">
                <img src="http://internetshop/public/storage/categories/bitovaya_technika.jpg" class="card-img-top" alt="...">
                
                <div class="card-body d-flex justify-content-center">
                <div class="card-title " style="">Бытовая техника для дома и кухни</div>
                </div>
            
            </a>
            </div>
                            <div class="card item-card">
                <input class="d-none" name="category_id" type="text" readonly="" value="5">
                <a class="card-container" href="http://internetshop/catalog/stroitelstvo-i-remont">
                <img src="http://internetshop/public/storage/categories/remont.jpg" class="card-img-top" alt="...">
                
                <div class="card-body d-flex justify-content-center">
                <div class="card-title " style="">Строительство и ремонт</div>
                </div>
            
            </a>
            </div>
                            <div class="card item-card">
                <input class="d-none" name="category_id" type="text" readonly="" value="6">
                <a class="card-container" href="http://internetshop/catalog/dom-i-dacha">
                <img src="http://internetshop/public/storage/categories/dacha.jpg" class="card-img-top" alt="...">
                
                <div class="card-body d-flex justify-content-center">
                <div class="card-title " style="">Дом и дача</div>
                </div>
            
            </a>
            </div>
                            <div class="card item-card">
                <input class="d-none" name="category_id" type="text" readonly="" value="7">
                <a class="card-container" href="http://internetshop/catalog/foto-video-sistemy-bezopasnosti">
                <img src="http://internetshop/public/storage/categories/photo.jpg" class="card-img-top" alt="...">
                
                <div class="card-body d-flex justify-content-center">
                <div class="card-title " style="">Фото, видео, системы безопасности</div>
                </div>
            
            </a>
            </div>
                            <div class="card item-card">
                <input class="d-none" name="category_id" type="text" readonly="" value="8">
                <a class="card-container" href="http://internetshop/catalog/avtotovary">
                <img src="http://internetshop/public/storage/categories/auto.jpg" class="card-img-top" alt="...">
                
                <div class="card-body d-flex justify-content-center">
                <div class="card-title " style="">Автотовары</div>
                </div>
            
            </a>
            </div>         
            
            </div>
        </div>
    </section>

    <script defer >
        $(function(){
            $(".slider").slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive:[
            {
                breakpoint: 980, // tablet breakpoint
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480, // large mobile breakpoint
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 424, // medium mobile breakpoint
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                
                }
            },
            {
                breakpoint: 374, // small mobile breakpoint
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                
                }
            }
        ]
            })   
           
        })
    </script>
    
@endsection
