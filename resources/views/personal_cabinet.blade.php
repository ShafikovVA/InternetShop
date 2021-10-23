@extends('layouts.layout')

@section('title', 'Личный кабинет')

@section('content')
    <section class="mt-5">
        <div class="container lk py-5 px-5" style="background: #ffffff">
            <h3>Данные профиля</h3>
            <form action="{{ Route('editPerson') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row mt-5">
                <div class="col-12 col-lg-4 d-flex flex-column first">
                @if ($data->image != "")
                <img src="{{ asset('public/storage/' . $data->image) }}" alt="" width="250" height="250" style="border-radius:4px; object-fit:cover">
                @else
                <img src="{{ asset('public/storage/uploads/qwtC1I69LwVbqu33LdzF51P5AkG6eFyc4AdCpnTi.png') }}" alt="" width="250" height="250" style="border-radius:4px">
                @endif
                   
                    <input type="file" id="image" name="image" wrapper="false" accept="image/jpeg,image/png,image/gif" class="d-flex justify-content-center p-3 border d-none" style="width: 250px">
                </div>
               
                <div class="col-12 col-lg-8 userdata">
                    @if($errors->any())
                <ul>
                   
                </ul>
                @endif
                        <div class="form-group d-flex flex-row">
                            <label  for="family" class="col-3 edit_label_value">Имя:</label>
                            <input name="firstname" id="family" class="edit_input_value " type="text" readonly value="{{ $data->first_name }}">
                        </div>
                        <div class="form-group d-flex flex-row"> 
                            <label for="name" class="col-3 edit_label_value">Фамилия:</label>
                            <input name="secondname" id="name" class="edit_input_value  " type="text" readonly placeholder="Фамилия" value="{{ $data->second_name }}">
                        </div>
                        <div class="form-group d-flex flex-row">
                                <label for="name" class="col-3 edit_label_value">Дата рождения:</label>
                                <input id="birthdate" name="birthdate" class="edit_input_value " type="text" readonly value="{{ $data->birthdate }}">
                        </div>
                        <div class="edit-submit form-group flex-row">
                            <button type="button" class="btn btn-primary  lc-cancel">Отменить</button>
                            <input type="submit" class="btn btn-outline-primary  lc-edit" value="Изменить">
                        </div>
                        
                   
                </div>
            </div>
        </form>
            <div class="row lc-edit">
                <button class="btn btn-outline-primary p-3 border mt-5 edit_profile_button d-flex justify-content-center">Редактировать данные</button>
            </div>
            <div class="row">
                <a href="{{ Route('logout') }}" class="btn btn-outline-danger p-3 border mt-5 edit_profile_button d-flex justify-content-center">Выйти из аккаунта</a>
            </div>
        </div>
    </section>
    <script src="public/assets/js/main.js"></script>
    
    </script>
   
@endsection