@extends('layouts.layout')

@section('title', $subcategory->name.' - ShafikovShop')
@section('content')
<section class="navigate">
    <div class="container">
      @if($subcategory->name == $firstLvlCatalog->name)
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
            <li class="breadcrumb-item"><a href="{{Route('subcatalog2', [$category->slug, $firstLvlCatalog->slug])}}">{{$firstLvlCatalog->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$subcategory->name}}</li>
          </ol>
        </nav>
      @endif
      
    </div>
  </section>
<section class="catalog pt-5" style="">
    <div class="container goods">
            <h4 class="mb-4 goods-title">Список товаров</h4>
            <div class="wrapper" style="margin-bottom: 50px">
                <div class="col1">
                    @foreach ($data as $el)
                    <div class="card">
                        <input  class="d-none" name="category_id" type="text" readonly >
                        <div class="card-container flex-row" >
                            <div class="card-body d-flex justify-content-start">
                                <div class="d-none" name="id">{{$el->id}}</div>
                                <img class='card-img' src="{{ asset('public/storage/' . $el->img) }}" width="100px" style="margin-right: 10px" alt="...">
                                <div class="row card-title d-flex flex-row" style="">
                                   <div class="card-description d-flex justify-content-between flex-row" style="padding: 0 12px"> 
                                        <p><a href="{{ Route('good', [$category->slug, $subcategory->slug, $el->slug]) }}">{{$el->name}}</a></p>
                                        <div class="card-price d-flex flex-column">
                                            <p class="price">{{number_format($el->price, 0, '.',' ')}} ₽</p>
                                            <p class="creditprice">или {{number_format($el->price/12, 0, '.',' ')}} ₽/ мес.</p>
                                        </div>
                                    </div>
                                    <div class=" d-flex justify-content-end flex-row">
                                        <button id="{{$el->id}}" type="button" class="add-to-cart buy btn btn-outline-primary" style="padding: 0 12px">Купить</button>
                                        
                                    </div>
                                    
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    @endforeach
                   <div class="pagination d-flex justify-content-center width-100">{{$data->links()}}</div> 
                </div>
               <div class="col2">
                    <div class="card"  >
                        
                        <form action="{{ Route('goods', [$category->slug, $subcategory->slug]) }}" class="card-body d-flex justify-content-start flex-column">
                            
                            <div class="accordion" id="accordionExample">
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Цена
                                      </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" >
                                      <div class="accordion-body d-flex justify-content-center">
                                          <input id="priceFrom" name="priceFrom" type="text" placeholder="от"> 
                                          <span class="mx-3">></span>
                                          <input id="priceTo" name="priceTo" type="text" placeholder="до">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        В наличии
                                      </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" >
                                      <div class="accordion-body">
                                          <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                              <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                              <label class="btn btn-outline-primary" for="btnradio1">В наличии</label>
                                            
                                              <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                              <label class="btn btn-outline-primary" for="btnradio2">Все товары</label>
                                            </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Элемент аккордеона #3
                                      </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                                      <div class="accordion-body">
                                        <strong>Это тело аккордеона третьего элемента.</strong> 
                                      </div>
                                    </div>
                                  </div>
                            </div>
                              <button type="submit" id="setFilters" class="btn btn-primary" style="width: 300px; align-self: center; padding: 10px; margin: 10px;">Применить</button>
                           
                            <a class="btn btn-outline-primary" style="width: 300px; align-self: center; padding: 10px; margin: 0 0 15px 0;" >Сбросить все</a>
                          </div>
                        </form>
                </div>
            </div>  
           
    </div>

</section>
<script defer>
    $(document).ready(function() {
        console.log( $('meta[name="csrf-token"]').attr('content'))
        console.log({{Log::debug('An informational message.')}});
        $('.add-to-cart').click(function() {
        let id = $(this).attr('id');
          addToCart(id);
         
        })
        $('#setFilters').click( function() { goodsFilter() } );
        
    })

    enterOnlyDigit('#priceFrom')
    enterOnlyDigit('#priceTo')

    function addToCart(id){
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
                  'id': id,
                  'category_slug': '{{$category->slug}}',
                  'subcategory_slug': '{{$subcategory->slug}}'
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: (data) => {
                  //console.log(data)
              }
          });
          console.log()
    }
    function enterOnlyDigit(selector){
      $('body').on('input', selector, function(){
	      this.value = this.value.replace(/[^0-9]/g, '');
    });
    }
    function goodsFilter(){
      let from, to;
      
        from = filter($('#priceFrom'))
        to =  filter( $('#priceTo'))
       /* $.ajax({
              url: "{{ Route('goods', [$category->slug, $subcategory->slug]) }}",
              type: 'GET',
              data:{
                  'priceFrom': from,
                  'priceTo': to,
                  'category_slug': '{{$category->slug}}',
                  'subcategory_slug': '{{$subcategory->slug}}'
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: (data) => {
                  //console.log(data)
                  window.location.href= ''
              }
          }); */

          
        $.get("{{ Route('goods', [$category->slug, $subcategory->slug]) }}", data= {priceFrom: from,priceTo: to}, console.log(data))

    }

    function filter(someElem){
      var val = someElem.val();

        if(val.length >= 1){
         return val
        }else {
          return ''
        }
    }
</script>
@endsection