@extends('layouts.layout')

@section('title', 'Корзина - ShafikovShop')

@section('content')
<section class="navigate">
    <div class="container">
     
    </div>
  </section>
<section class="catalog pt-5" style="">
    <div class="container cart">
         
        @php
        $totalPrice = 0;
        @endphp
            <h4 class="mb-4 goods-title">Корзина</h4>
            @if(isset($_COOKIE['cart_id']) && \Cart::session($_COOKIE['cart_id'])->getTotalQuantity() == 0)
            <div class=" card justify-content-center" style="height: 400px">
                <input  class="d-none" name="category_id" type="text" readonly >
                <div class="card-container flex-row">
                    <div class="cart-message card-body d-flex justify-content-center align-items-center flex-column">
                       <p class="mb-5 title">Вы не добавили ни одного товара в корзину</p>
                        <a href="{{Route('main')}}" class="button btn btn-outline-primary" style="width:600px">начать покупки</a>
                    </div>
                </div>
            </div>
           @else
            <div class="wrapper" style="margin-bottom: 50px">
                <div class="col1">
                    @if (isset($_COOKIE['cart_id']))
                        @foreach (\Cart::session($_COOKIE['cart_id'])->getContent() as $cart)
                            <div class="card ">
                                <input  class="d-none" name="category_id" type="text" readonly >
                                <div class="card-container flex-row" >
                                    <div class="card-body d-flex justify-content-start">
                                        <img src="{{ asset('public/storage/'.$cart->attributes->img) }}" width="100px" style="margin-right: 10px; object-fit: contain;" alt="...">
                                        <div class="row card-title d-flex" style="">
                                            <div class="first-sm cart-title d-flex justify-content-between " style="padding: 0 12px"> 
                                                    <p><a href="{{Route('good', [$cart->attributes->category, $cart->attributes->subcategory, $cart->attributes->slug])}}">
                                                        {{$cart->name }}</a></p>
                                                    <div class=" d-flex flex-column">
                                                        <p class="price">{{number_format($cart->price, 0,'.', ' ')}}</> ₽</p>
                                                        <p class="creditprice">или {{number_format($cart->price/12, 0,'.', ' ')}} ₽/ мес.</p>
                                                    </div>
                                            </div>
                                            <div class="cart-buttons d-flex justify-content-between">
                                                <div class="selector ">
                                                    <button id="{{$cart->id}}" class="left_btn btn btn-outline-primary"><</button>
                                                    <p name="cart_quantity" class="el-quantity mx-2">{{$cart->quantity}}</p>
                                                    <button id="{{$cart->id}}" class="right_btn btn btn-outline-primary">></button>
                                                </div>
                                                
                                                <button id="{{$cart->id}}" type="button" class="remove btn btn-outline-danger remove-to-cart" style="padding: 0 12px">Убрать из корзинки</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            @php
                                $totalPrice += ($cart->price * $cart->quantity);
                            @endphp
                        @endforeach
                    @endif
                   
                   <div class="pagination d-flex justify-content-center width-100"></div> 
                </div>
                <div class="col2 shopping-cart">
                    <div class="card" style="height: 150px; padding: 20px">
                       
                        <div  class="card-body d-flex justify-content-start flex-column">
                            <div class="card-title " style="">
                                <p class="total-price">Итого: {{$totalPrice}}</p>
                            </div>
                            <a href="{{Route('about')}}" type="button" class="order-buy btn btn-outline-primary" style="padding: 0 12px">Оформить заказ</a>
                        </div>
                       
                    </div>
                </div>
               
            </div>  
            @endif
           
    </div>

</section>
<script defer>
     $(document).ready(function() {
        $('.remove-to-cart').click(function() {
            

            id = $(this).attr('id')
            removeToCart(id);

            
            parent = $(this).closest('.card');
            parent.addClass('d-none');

            quantity = parseInt($(this).siblings().children('.el-quantity').text());
            let total_quantity = parseInt($('.cart-quantity').text());
            $('.cart-quantity').text(total_quantity-quantity);
            if($('.cart-quantity').text('0')){
                document.querySelector('.cart-quantity').classList.add('d-none');
            }
         
        })
        $('.left_btn').click(function() {
           let el_quantity = parseInt($(this).siblings('.el-quantity').text());
            if(el_quantity > 1){
                $(this).siblings('.el-quantity').text(el_quantity-1)

                let total_quantity = parseInt($('.cart-quantity').text());
                $('.cart-quantity').text(total_quantity-1);

                let quantity = parseInt($(this).siblings('.el-quantity').text());
               
                
                let id = $(this).attr('id');
                updateToCart(id, quantity);
            }
        })
        $('.right_btn').click(function() {
            let el_quantity = parseInt($(this).siblings('.el-quantity').text());
            $(this).siblings('.el-quantity').text(el_quantity+1)

            let total_quantity = parseInt($('.cart-quantity').text());
            $('.cart-quantity').text(total_quantity+1);

            let quantity = parseInt($(this).siblings('.el-quantity').text());
            console.log(quantity);

            let id = $(this).attr('id');
            updateToCart(id, quantity);
        })

    })
    
    function removeToCart(id){
        $.ajax({
            url: "{{ Route('removeToCart') }}",
            type: 'POST',
            
            data:{
                @if(isset($cart))
                    'id': id,
                @endif
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    }
    function updateToCart(id, quantity){
        $.ajax({
            url: "{{ Route('updateToCart') }}",
            type: 'POST',
            
            data:{
                @if(isset($cart))
                    'id': id,
                    'quantity' : quantity
                @endif
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    }
</script>
@endsection