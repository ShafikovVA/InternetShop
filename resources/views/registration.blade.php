<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/main.css">
    <script src="public/assets/bootstrap/js/bootstrap.min.js"></script>
  <title>Регистрация</title>
</head>
<body>
  <section class="my-5">
    <div class="container">
      @if ($errors->any())
      <ul class="errors">
        @foreach ($errors->all() as $error)
          <li class="text-danger">{{$error}}</li>
        @endforeach
      </ul>
      @endif
        <form action="{{ Route('reg') }}" method="POST" class="d-flex flex-column">
          @csrf
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Ваше имя</label>
              <input name="first_name" type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ваш email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input  name="password" type="password" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Повторите пароль</label>
                <input  name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="mb-3 form-check">
                <input name="check" type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Согласие на обработку <a>персональных данных</a> </label>
              </div>
              <button type="submit" class="btn btn-primary">Зарегестрироваться</button>
            
        </form>
    </div>
</section>
</body>
</html>

    

