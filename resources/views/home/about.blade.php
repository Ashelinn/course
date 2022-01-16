@extends('layouts.app')
@section('menu')
    @parent
@endsection

@section('content')
    <div class="container">
        <div id="about">
            <div class="row">
                <div class="col-8">
                    <h2>
                        Источник знаний для вашего роста
                     </h2>
                     <p>
                       В каждом есть сила и талант. Мы помогаем найти путь развития 
                       и реализовать себя через профессию. Мы верим в успех каждого. 
                       Мы даем знания и навыки, которые помогают реализовать себя в профессии, 
                       больше зарабатывать, оптимизировать рутину и заниматься более сложными, но
                       интересными задачами.
                     </p>
                     <div class="main-features">
                        <div class="main-features_item">
                            <img src="{{asset('assets/img/tick.svg')}}" alt="галочка">
                            <p class="main-features_paragraf">Развивться в профессии</p>
                        </div>
                        <div class="main-features_item">
                            <img src="{{asset('assets/img/tick.svg')}}" alt="галочка">
                            <p class="main-features_paragraf">Освоить новую специальность</p>
                        </div>
                        <div class="main-features_item">
                            <img src="{{asset('assets/img/tick.svg')}}" alt="галочка">
                            <p class="main-features_paragraf">Обучать сотрудников</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <img src="{{asset('assets/img/main.png')}}" class="about-foto">
                </div>
            </div>          
        </div>
    </div>


<div id="contacts">
    <div class="contacts-title"> 
        <div class="container">
            <h4>
                Контактная информация
            </h4>
        </div>
    </div>

    <div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-sm-12">
                    <h4>Наш офис:</h4>
                    <p>г. Москва, улица Хромова, 3</p>
                    <p class="contacts-time">Ждем вашего звонка по будням с 10:00 до 19:00 по МСК</p>
                    <p>
                        По вопросам обучения 
                    </p>
                    <p class="contacts-phone">8 800 333 38 35</p>
                    <p>
                        Техническая поддержка 
                    </p>
                    <p class="contacts-phone">8 800 333 38 37</p>
                    <p>
                        Вопросы сотрудничества 
                    </p>
                    <p class="contacts-phone">8 800 333 38 39</p>
                    <p class="contacts-mail">
                        Или напишите нам 
                    </p>
                    <p class="contacts-phone">support@sinauinc.com</p>
                </div>
                <div class="col-lg-8 col-sm-8 col-sm-12">
                    <a class="dg-widget-link" href="http://2gis.ru/moscow/firm/70000001034648478/center/37.715871334075935,55.80147394036698/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">Посмотреть на карте Москвы</a><div class="dg-widget-link"><a href="http://2gis.ru/moscow/firm/70000001034648478/photos/70000001034648478/center/37.715871334075935,55.80147394036698/zoom/17?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=photos">Фотографии компании</a></div><div class="dg-widget-link"><a href="http://2gis.ru/moscow/center/37.71588,55.800038/zoom/16/routeTab/rsType/bus/to/37.71588,55.800038╎HTML Studio, компания?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">Найти проезд до HTML Studio, компания</a></div><script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script><script charset="utf-8">new DGWidgetLoader({"width":'100%',"height":200,"pos":{"lat":55.80147394036698,"lon":37.715871334075935,"zoom":16},"opt":{"city":"moscow"},"org":[{"id":"70000001034648478"}]});</script><noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript. Включите его в настройках вашего браузера.</noscript>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

