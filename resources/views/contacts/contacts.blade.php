@extends('layouts.layout')

@section('title', 'Контакты')
@section('content')
<section class="contacts mt-5">
    <div class="container lk py-5 px-5" style="background: #ffffff">
        <h3 style="margin-bottom: 30px">Автор, директор, персонал и прочее</h3>
        
            
        <div class="row mt-5">
            <div class="first col-12 col-md-5 d-flex flex-column">
                <img class="img_contact" src="{{ asset('public/storage/system/autor/photo_2021-10-16_22-12-03.jpg') }}" alt="">
                <input type="file" id="image" name="image" wrapper="false" accept="image/jpeg,image/png,image/gif" class="d-flex justify-content-center p-3 border d-none" style="width: 250px">
            </div>
           
            <div class="col-12 col-md-7 userdata">
           
                    <div class="form-group d-flex flex-row">
                        <p name="firstname" id="family" class="edit_input_value " type="text" readonly value="  ">Владислав</p>
                    </div>
                    <div class="form-group d-flex flex-row"> 
                        <p name="secondname" id="name" class="edit_input_value  " type="text" readonly placeholder="Фамилия" value="  ">Шафиков</p>
                    </div>
                    <div class="form-group d-flex flex-row">
                         <p  name="birthdate" class="edit_input_value " type="text" readonly value=" }">Junior web-developer</p>
                    </div>
                    <div class="form-group d-flex flex-row">
                        <a class="icon" target="_blank" href="{{ url('https://www.instagram.com/yung_vlead/?hl=ru')}}"><img src="{{asset('public/storage/system/contacts/free-icon-instagram-2111463 1.png')}}" alt=""></a>
                        <a class="icon" target="_blank" href="{{ url('https://github.com/ShafikovVA')}}"><img src="{{asset('public/storage/system/contacts/premium-icon-github-3291695 1.png')}}" alt=""></a>
                        <a class="icon" href="mailto:vshafikov@list.ru"><img src="{{asset('public/storage/system/contacts/premium-icon-open-mail-4059271 1.png')}}" alt=""></a>
                        <a class="icon" href="tel:+79227442699"><img src="{{asset('public/storage/system/contacts/free-icon-phone-call-455705 1.png')}}" alt=""></a>
                    </div>
                    <div class="edit-submit form-group flex-row">
                        <button type="button" class="col-5 lc-cancel">Отменить</button>
                        <input type="submit" class="col-5 lc-edit" value="Изменить">
                    </div>
                    
               
            </div>
        </div>
  
    </div>
</section>
@endsection