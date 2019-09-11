@extends('layouts.admin')

@section('content')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Предпросмотр страницы контакты</h1>
      <ul class="nav nav-tabs mt-3">
        <li class="nav-item">
          <a class="nav-link " href="{{route('admin.contacts')}}">Контакты</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('admin.adress')}}">Настройка карты</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('admin.preview')}}">Предпросмотр</a>
        </li>
      </ul>
  </div>

    <!-- Main content -->
    <section class="content">
      {!! $contacts->body !!}
      <div id="map" style="width: 600px; height: 400px; margin: 50px auto;" ></div>
  </div>
    </section>
<script type="text/javascript">
    ymaps.ready(init);
    function init(){ 
        // Создание карты.    
        var myMap = new ymaps.Map("map", {
            // Координаты центра карты.
            // Порядок по умолчанию: «широта, долгота».
            // Чтобы не определять координаты центра карты вручную,
            // воспользуйтесь инструментом Определение координат.

            center: [{{$contacts->yCoordinate}}, {{$contacts->xCoordinate}}],
            // Уровень масштабирования. Допустимые значения:
            // от 0 (весь мир) до 19.
            zoom: 17
        });

        var myPlacemark = new ymaps.Placemark([{{$contacts->yCoordinate}}, {{$contacts->xCoordinate}}]);
        myMap.geoObjects.add(myPlacemark); 
    }
</script>

@endsection
