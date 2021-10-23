@extends('layouts.layout')

@section('title', 'товар')

@section('content')
<section class="item pt-5">
    <div class="container">
        <div class="row item-header">
            <div class="col-12 col-md-6 order-sm-first order-last">
                <div id="carouselExampleCaptions" class="carousel vert slide pointer-event" data-bs-ride="carousel">
                    <div class="d-flex">
                        <div class="slider carousel-indicators">
                            @php
                                $p = 0;
                            @endphp
                            
                            @foreach ($images as $image)
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$p}}" class="@if($p==0)active @endif" aria-label="Slide {{$p}}"><img src="{{asset('public/storage/'.$image->path)}}" class="d-block w-100" alt="..."></button>
                                @php
                                    $p++;
                                @endphp
                            @endforeach
                            
                        </div>
                        <div class="carousel-inner">
                            @php
                                $p = 0;
                            @endphp
                            @foreach ($images as $image)
                            <div class="carousel-item @if ($p == 0)
                            active
                            @endif">
                                <img src="{{asset('public/storage/'.$image->path)}}" class="productImage d-block w-100" alt="...">
                            </div>
                            @php
                                $p++;
                             @endphp
                            @endforeach
                         
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-12 col-md-6 order-md-0 order-sm-last order-first">
           
                <h4 name='name' class="mb-5">{{$data->name}}</h4>
                <div class="d-flex justify-content-end mb-3 adaptive-price-row">
                    <p class="price">{{number_format($data->price, 0, '.', ' ')}} ₽</p>
                
                    <a  class="add-to-cart buy btn btn-primary">Купить</a>
                   
                </div>
                <p></p>
            </div>   
        </div>
    </div>
</section>
<section class="item-desc pt-5 pb-5">
    <div class="container">
        <div class="row item-desc-header">
           <span class="desct-item "><a class="desct-item-spec">Характеристики</a></span>
           <span class="desct-item "><a class="desct-item-desc">Описание</a></span>
           <span class="desct-item "><a class="desct-item-review">Отзывы</a></span>
        </div>
        <div class="row item-desc-body">
            <div class="row scecifications ">
                @foreach ($spec_titles as $titles)
                <div class="spec col-12 col-md-6">
                    <p class="title">{{$titles->name}}</p>
                    <ul>
                        @foreach (App\Models\Specification::where('specification_title_id', $titles->id)->get() as $spec)
                        <li><p class="key">{{$spec->name}}</p>
                        <p>{{$spec->value}}</p></li>
                         @endforeach
                    </ul>
                </div> 
                @endforeach
            </div>
            <div class="row description ">
                @php echo $data->description @endphp
            </div>
            <div class="row reviews ">
                @auth
                <form method="POST" action="{{Route('addReview', [$category->slug, $subcategory->slug, $data->slug] )}}" class="row mb-5 justify-content-end">
                    @csrf
                    <input type="text" class="d-none" name="product_id" placeholder="" value="{{$data->id}}">
                    <input type="textarea" name="review" placeholder="Оставьте свой отзыв"class="form-control mb-3" aria-label="With textarea"></textarea>
                    <button type="submit" class="button btn btn-primary" style="width: 300px">Отправить</button>
                </form>
                    
                @else
                    <div class="row mb-5 justify-content-end">
                        <button class="button btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#auth" style="">Войдите чтобы написать комментарий</button>
                    </div>
                @endif
                <div class="row review">
                    @foreach ($reviews as $review)
                    <div class="message-wrapper">
                        @if ((App\Models\User::where('id',$review->user_id)->first())->image != '')
                        <img src="{{asset('public/storage/'. (App\Models\User::where('id',$review->user_id)->first())->image)}}" width=70px height=70px alt="">
                        @else
                        <img src="{{asset('public/storage/uploads/qwtC1I69LwVbqu33LdzF51P5AkG6eFyc4AdCpnTi.png')}}" width=70px height=70px alt="">
                        @endif
                        
                        <div class="d-flex flex-column">
                        
                            <div class="d-flex flex-row adaptive-date-row">
                                <p style="margin-right: 50px; font-weight: 600">{{(App\Models\User::where('id',$review->user_id)->first())->first_name}}</p>
                                <p>{{$review->created_at}}</p>
                            </div>
                            <p>{{$review->review}}</p>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
         </div>
    </div>
</section>

<script defer src="{{asset('public/assets/js/tovar_page.js')}}"></script>
<script defer >
    $(function(){
        $(".slider").slick({
        arrows: true,
        infinite: false,
        slidesToShow: 8,
        slidesToScroll: 7,
        vertical: true,
        verticalSwiping: true,
        adaptiveHeight: true,
        adaptiveWidth: true,
        responsive:[
            {
                breakpoint: 980, // tablet breakpoint
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480, // large mobile breakpoint
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 424, // medium mobile breakpoint
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                
                }
            },
            {
                breakpoint: 374, // small mobile breakpoint
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                
                }
            }
        ]
        })   
       
    })
</script>
<script src="{{asset('public/assets/jquery-loupe/jquery.loupe.min.js')}}"></script>
<script >
 
$('.productImage').loupe({
  width: 300, // ширина лупы
  height: 300, // высота лупы
  loupe: 'loupe' // css класс лупы
});
</script>
<script defer>
    $(document).ready(function() {
        console.log( $('meta[name="csrf-token"]').attr('content'))
        console.log({{Log::debug('An informational message.')}});
        $('.add-to-cart').click(function() {
          addToCart();
         
        })
    })
    function addToCart(){
    let total_quantity = 0;
    if($('.cart-quantity').text() != ''){
        total_quantity = parseInt($('.cart-quantity').text());
    }
    $('.cart-quantity').text(total_quantity+1);
    document.querySelector('.cart-quantity').classList.remove('d-none');

      $.ajax({
            url: "{{ Route('addToCart') }}",
            type: 'POST',
            data:{
                'id': {{$data->id}},
                'category_slug': '{{$category->slug}}',
                'subcategory_slug': '{{$subcategory->slug}}'
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                console.log(data)
            }
        });
        console.log()
    }
</script>
@endsection