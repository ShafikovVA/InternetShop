@extends('layouts.layout')
@section('title', 'admin_panel')

@section('content')
<section class="my-5">
    {{Session::get('message')}}
    <div class="container">
        <div class="row item-desc-header">
           <span class="desct-item active"><a class="desct-item-spec">Создать новый товар</a></span>
           <span class="desct-item"><a class="desct-item-desc">Описание</a></span>
           <span class="desct-item"><a class="desct-item-review">Отзывы</a></span>
        </div>
        <div class="row item-desc-body">
            <div class="row scecifications">
                     <div class="">
                        <div class="form-group d-flex flex-row">
                            <label for="family" class="col-3 edit_label_value ready-edit-label">Название товара:</label>
                            <input name="name" id="family" class="edit_input_value ready-edit col-9" type="text" >
                        </div>
                        <div class="form-group d-flex flex-row"> 
                            <label for="name" class="col-3 edit_label_value ready-edit-label">Категория:</label>
                            <select name="category" id="name" class="edit_input_value ready-edit col-9" type="" placeholder="Фамилия" >
                            
                                @foreach ($allCategories as $category)
                                    <option value="{{$category->id}}"> {{$category->name}} </option>
                                @endforeach
                            </select>
                        </div>
                       <div class="form-group d-flex flex-row"> 
                            <label for="name" class="col-3 edit_label_value ready-edit-label">Категория 2 уровня:</label>
                            <select name="subcategoru" id="name" class="edit_input_value ready-edit col-9" type="" placeholder="Фамилия" >
                                @foreach (App\Models\Subcategory::where('id', 1) as $subcategory)
                                    <option value="{{$subcategory->id}}"> {{$subcategory->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group d-flex flex-row"> 
                            <label for="name" class="col-3 edit_label_value ready-edit-label">Категория 3 уровня:</label>
                            <select name="secondname" id="name" class="edit_input_value ready-edit col-9" type="" placeholder="Фамилия" >

                            </select>
                        </div>
                        <div class="form-group d-flex flex-row">
                            <label for="family" class="col-3 edit_label_value ready-edit-label">Цена:</label>
                            <input name="firstname" id="family" class="edit_input_value ready-edit col-9" type="text" >
                        </div>
                        <div class="form-group d-flex flex-row">
                            <label for="family" class="col-3 edit_label_value ready-edit-label">Описание:</label>
                            <textarea name="firstname" id="family" class="edit_input_value ready-edit col-9" type="textarea" > </textarea>
                        </div>
                        <div class="form-group d-flex flex-row">
                            <label for="family" class="col-3 edit_label_value ready-edit-label">Превью товара:</label>
                            <input name="firstname" id="family" class="edit_input_value ready-edit col-9" type="file" >
                        </div>
                        <div class="form-group d-flex flex-row">
                            <label for="family" class="col-3 edit_label_value ready-edit-label">Изображения:</label>
                            <input name="firstname" id="family" class="edit_input_value ready-edit col-9" type="file" >
                        </div>
                        <div class="edit-submit form-group flex-row ready-submit">
                            <button type="button" class="btn btn-primary  lc-cancel">Отменить</button>
                            <input type="submit" class="btn btn-outline-primary  lc-edit" value="Создать">
                        </div>
                        
                   
                </div>
            <div class="row description d-none">
                Бюджетный смартфон рассчитан на выполнение основных рабочих, мультимедийных задач и серфинг в интернете. Производитель укомплектовал смартфон чипсетом MediaTek Helio G25, поэтому модель Redmi 9А можно смело рассматривать любителям активной жизни онлайн.            </div>
            <div class="row reviews d-none">
                                <form method="POST" action="http://internetshop/catalog/smartfony-i-gadzhety/smartfony/xiaomi-redmi-9a-232gb-granite-gray" class="row mb-5 justify-content-end">
                    <input type="hidden" name="_token" value="MOkVJR6fpNAv5CrqYm6rOXMzDMrpjJch56uS4Bqf">                    <input type="text" class="d-none" name="product_id" placeholder="" value="1">
                    <input type="textarea" name="review" placeholder="Оставьте свой отзыв" class="form-control mb-3" aria-label="With textarea">
                    <button type="submit" class="button btn btn-primary" style="width: 300px">Отправить</button>
                </form>
                    
                                <div class="row review">
                                        
                </div>
            </div>
         </div>
    </div>
</section>
<script defer>
    $(document).ready(function() {
        console.log( $('meta[name="csrf-token"]').attr('content'))
        console.log({{Log::debug('An informational message.')}});
       
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