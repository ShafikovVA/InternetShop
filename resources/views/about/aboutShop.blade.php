@extends('layouts.layout')

@section('title' , 'О магазине')

@section('content')
    <section class="about first" style="padding: 5rem 0 5rem 0">
        <section class="item" >
            <div class="container">
                <div class="row item-header">
                    <div class="wrapper">
                        <div> 
                            <p class="first-arrow _anim-items">
                                <svg fill="#fff" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
                                    <path id="XMLID_224_" d="M325.606,229.393l-150.004-150C172.79,76.58,168.974,75,164.996,75c-3.979,0-7.794,1.581-10.607,4.394
                                        l-149.996,150c-5.858,5.858-5.858,15.355,0,21.213c5.857,5.857,15.355,5.858,21.213,0l139.39-139.393l139.397,139.393
                                        C307.322,253.536,311.161,255,315,255c3.839,0,7.678-1.464,10.607-4.394C331.464,244.748,331.464,235.251,325.606,229.393z"/>
                                </svg>
                           
                            </p>
                        </div>
                        <div class="col-12 justify-content-end">
                    
                            <h4 class="_anim-items _anim-no-hide" name='name' style='margin-bottom: 100px'>На самом деле это не интернет магазин.</h4>
                            
                            <div class="d-flex  mb-3">
                                <p class="text _anim-items">На самом деле этот сайт является макетом,
                                    сделанный с целью получить знания и опыт в области веб-разработки
                                    на фреймворке Laravel и языке программирования javascript.
                                    
                                    На нем нельзя ничего купить  и все товары что тут присутствуют не являются подлинными и не могут быть выставлены на продажу.
                                    
                                    </p>
                            </div>
                            <p></p>
                        </div>   
                    </div>
                </div>
            </div>
        </section>
        <section class="item">
            <div class="container">
                <div class="row item-header">
                    <div class="wrapper">
                        <div> </div>
                        <div class="col-12 justify-content-end">
                    
                            <h4 class="_anim-items _anim-no-hide" name='name' style='margin-bottom: 100px'>Зачем я это делаю?</h4>
                            
                            <div class="d-flex  mb-3">
                                <p class="text _anim-items">На разработку сайта была прежде всего была поставлена цель:<br>
                                     получить существенный опыт работы с фреймворком<br>
                                      и соответствующими инструментами разработки.
                                    </p>
                            </div>
                            <p></p>
                        </div>   
                    </div>
                </div>
            </div>
        </section>
        <section class="item">
            <div class="container">
                <div class="row item-header">
                    <div class="wrapper">
                        <div> </div>
                        <div class="col-12 justify-content-end">
                    
                            <h4 class="_anim-items _anim-no-hide" name='name' style='margin-bottom: 100px'>Были поставлены и решены задачи:</h4>
                            
                            <div class="d-flex  mb-3">
                                
                                    <ul class="list">
                                        <li class="_anim-items"><img width="50" height="50" src="{{asset('public/storage/about/icon figma vector.png')}}" alt=""> Разработка макетов страниц сайта на figma;</li>
                                        <li class="_anim-items"><img width="50" height="50" src="{{asset('public/storage/about/PHP-logo.svg.png')}}" alt=""> Парсинг данных веб-сайтов на php;</li>
                                        <li class="_anim-items"><img width="50" height="50" src="{{asset('public/storage/about/Mysql.png')}}" alt=""> Проектирование и разработка базы данных;</li>
                                        <li class="_anim-items"><img width="50" height="50" src="{{asset('public/storage/about/javascript-2752148-2284965.webp')}}" alt=""> Верстка статических и динамических страниц;</li>
                                        <li class="_anim-items"><img width="50" height="50" src="{{asset('public/storage/about/1200px-Laravel.svg.png')}}" alt=""> Разработка логики сайта.</li>
                                    </ul>
                               
                            </div>
                            <p></p>
                        </div>   
                    </div>
                </div>
            </div>
        </section>
        <section class="item">
            <div class="container">
                <div class="row item-header">
                    <div class="wrapper">
                        <div> </div>
                        <div class="col-12 justify-content-end">
                    
                            <h4 class="_anim-items _anim-no-hide" name='name' style='margin-bottom: 100px'>В чем прикол сайта?</h4>
                            
                            <div class="d-flex  mb-3">
                                <p class="text _anim-items">Основное описание работы:<br>
                                    Разработка функционального веб сайта интернет магазина.
                                    Реализация UI и дружелюбного к пользователю интерфейса, используя все современные технологии на данный момент. 
                                    Пользователь может просматривать товары, которые распределены по каталога и подкаталогам, добавлять товары в корзину, также оставлять отзывы и ставить рейтинги.
                                    
                                    </p>
                            </div>
                            <p></p>
                        </div>   
                    </div>
                </div>
            </div>
        </section>
    </section>
    <script defer src="{{asset('public/assets/js/animation.js')}}"></script>
@endsection