@extends('layouts.admin')

@section('content')
  
  @include('admin.partials._navigation')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Записаться на прием</h1>
      <ul class="nav nav-tabs mt-3">
        <li class="nav-item">
          <a class="nav-link " href="{{route('admin.contacts')}}">Контакты</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('admin.adress')}}">Настройка карты</a>
        </li>
<!--         <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li> -->
      </ul>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
<!--           <h1>Введите адрес для отображения на карте</h2> -->
          <form action="{{route('admin.adress.store')}}" method="post" accept-charset="utf-8">
            @csrf
            <div class="form-group">
              <label for="cardName">Введите адрес для отображения на карте</label>
              <input id="adress" name='adress' class="form-control" placeholder="Введите адрес" value="{{ $contacts->adress}}">
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Сохранить</button>
          </form>
          <input type="hidden" name="xCoordinate" id='xCoordinate' value="{{ $contacts->xCoordinate}}">
          <input type="hidden" name="yCoordinate" id='yCoordinate' value="{{ $contacts->yCoordinate}}">
          <div id="map" style="width: 600px; height: 400px; margin: 50px auto;" >
            
          </div>
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

            <div id="map" style="width: 600px; height: 400px"></div>

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
