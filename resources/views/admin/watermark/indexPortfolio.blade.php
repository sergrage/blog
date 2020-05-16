@extends('layouts.admin')

@section('content')
  
    <!-- Main content -->
    <section class='content'>
          <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Добавление водяного знака на фотографии</h1>
      </div>
      <div class="container">
        <div class="row">
            <div class="col-6 bg-white p-3">
              <p>Выберите фотографию</p>
              @foreach($portfolio->photos as $image)
                <div class="card p-3 mb-3 imagePreview" data-id="{{ $image->id }}" data-toggle="modal" data-target="#modalImage">
                    <img src="{{$image->path}}?{{time()}}" class="card-img-top" >
                </div>
              @endforeach
            </div>
            <div class="col-6 bg-white p-4">
              <form method="POST" action="{{route('admin.addWatermark', $portfolio)}}">
              @csrf
              <div class="form-group">
                <label for="textWatermark">Введите текст</label>
                <input type="text" class="form-control" id="textWatermark" placeholder="Введите текст">
                <small id="emailHelp" class="form-text text-muted">данный текст будет отображаться на фотографии</small>
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="watermarkCheck" checked>
                <label class="form-check-label" for="watermarkCheck">Наложить изображение</label>
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="textCheck" >
                <label class="form-check-label" for="textCheck">Наложить текст</label>
              </div>
              <button type="submit" id='btnMakeWatermark' class="btn btn-primary">Применить</button>
              </form>
              <hr>
              <div class="card bg-dark" style="width: 18rem;">
                <img src="/shmatovskaya.png" alt="Park" class="card-img-top p-3">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>

            </div>
          </div>
        </div>
<!--         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalImage">
          Launch demo modal
        </button> -->
        <div class="modal" tabindex="-1" role="dialog" id="modalImage">
          <div class="modal-dialog-centered mw-100" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Наложить водяной знак</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body text-center">
                <div class="imageContent d-inline-block position-relative"></div> 
              </div>
              <div class="modal-footer">
                <label>Прозрачность</label>
                <input type="range" min="0" max="1" step="0.01" id="opacityWatermark" value="1">
                <label>Размер</label>
                <input type="range" min="" max="" step="1" id="sizeWatermark" value="">
<!--                 <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups"> -->
<!--                   <div class="btn-group mr-2" role="group" aria-label="First group">
                    <button type="button" class="btn btn-secondary btnLeft"><i class="fas fa-arrow-left"></i></button>
                    <button type="button" class="btn btn-secondary btnRight"><i class="fas fa-arrow-right"></i></button>

                  </div>
                <div class="btn-group mr-2" role="group" aria-label="Second group">
                  <button type="button" class="btn btn-secondary btnUp"><i class="fas fa-arrow-up"></i></button>
                  <button type="button" class="btn btn-secondary btnDown"><i class="fas fa-arrow-down"></i></button>
                </div> -->
<!--               </div> -->
                <form action="{{route('admin.addWatermarkPortfolio', $portfolio)}}" method="POST" accept-charset="utf-8">
                  @csrf
                  <input type="hidden" name="post_id" value="{{$portfolio->id}}">
                  <input type="hidden" name="images" id="addWatermarkInput">
                  <input id="inputX" type="hidden" name="positionX" value="0">
                  <input id="inputY" type="hidden" name="positionY" value="0">
                  <input id="inputSize" type="hidden" name="size" value="0">
                  <input id="inputOpacity" type="hidden" name="opacity" value="1">
                  <button type="submit" class="btn btn-primary saveImage">Сохранить изменения</button>
                </form>
                <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Закрыть</button>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- /.content -->
@endsection


@section('imagesWatermark')
<script>

  $(document).on('click', '.imagePreview', function(e){

    // Долавляем id картинки в поле input
    var imageId = $(this).data('id');
    $('#addWatermarkInput').val(imageId);

    $.ajax({
        url: "/administrator/watermark/portfolio/returnImagePortfolio",
        type: "POST",
        data: {
          imageId :  imageId 
        },
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data)
        {
          // добавляем изображения
          $('.imageContent').html(data);

          let positionX = 0;
          let positionY = 0;
          let size = $('.logoImg').width();
          let opacity = 1;

          let inputX = $("#inputX"); // поле X
          let inputY = $("#inputY"); // поле Y
          let inputSize = $("#inputSize"); // поле size
          let inputOpacity = $("#inputOpacity"); // поле opacity

          let elem = document.querySelector('.imageContent'); 
          let div = document.querySelector('.logoImg'); 
          let mousedown = false; 

          $('#sizeWatermark').attr({
             "max" : size,
             "min" : 0,
             "value": size
          });
          
          // добавляем первоначильный size в поле size
          inputSize.val(size);

          // обработка изменения opacity
          $('#opacityWatermark').change(function(){
            opacity = $('#opacityWatermark').val();
            $('.logoImg').css({'opacity': opacity });
            inputOpacity.val(opacity);
          });

          // обработка изменения size
          $('#sizeWatermark').change(function(){
            size = $('#sizeWatermark').val();
            $('.logoImg').css({'width': size + 'px' });
            size = $('.logoImg').width();
            inputSize.val(size);
          });

          // $(document).on('click', '.btnRight', function(e){
          //   positionX = (positionX + 5) + 'px';
          //   $('.logoImg').css({'left': positionX });
          //   positionX = positionX.substring(0, positionX.length - 2) * 1;
          //   inputX.val(positionX);
          // });
          // $(document).on('click', '.btnLeft', function(e){
          //   positionX = (positionX - 5) + 'px';
          //   $('.logoImg').css({'left': positionX });
          //   positionX = positionX.substring(0, positionX.length - 2) * 1;
          //   inputX.val(positionX);
          // });
          // $(document).on('click', '.btnUp', function(e){
          //   positionY = (positionY - 5) + 'px';
          //   $('.logoImg').css({'top': positionY });
          //   positionY = positionY.substring(0, positionY.length - 2) * 1;
          //   inputY.val(positionY);
          // });
          // $(document).on('click', '.btnDown', function(e){
          //   positionY = (positionY + 5) + 'px';
          //   $('.logoImg').css({'top': positionY });
          //   positionY = positionY.substring(0, positionY.length - 2) * 1;
          //   inputY.val(positionY);
          // });



  
         // div event mousedown 
         div.addEventListener('mousedown', function (e) { 
             // mouse state set to true 
             mousedown = true; 
             // subtract offset 
             positionX = div.offsetLeft - e.clientX; 
             positionY = div.offsetTop - e.clientY; 

         }, true); 
          
         // div event mouseup 
         div.addEventListener('mouseup', function (e) { 
            // mouse state set to false
            mousedown = false; 
         }, true); 
          
         // element mousemove to stop 
         elem.addEventListener('mousemove', function (e) { 
             // Is mouse pressed 
             if (mousedown) { 
                 // Now we calculate the difference upwards 
                 div.style.left = e.clientX + positionX + 'px'; 
                 div.style.top = e.clientY + positionY + 'px';

                 inputX.val(e.clientX + positionX);
                 inputY.val(e.clientY + positionY);
             } 
         }, true); 

          // очищаем контейнер .imageContent при закрытии modal
          $(document).on('click', '.closeModal', function(e){
            $('.imageContent').html('');
          });

        },
        error: function(){
          alert('Что-то пошло не так!');
        }
    });
  }); 
</script>


@endsection
