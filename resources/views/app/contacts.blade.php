@extends('layouts.app')
@section('content')
    <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container ck-content1">
            <div class="row">
                <div class="col-12">
                    {!! addBootstrap($contacts->body) !!}
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div id="map" style="width: 600px; height: 400px; margin: 50px auto;" ></div>
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