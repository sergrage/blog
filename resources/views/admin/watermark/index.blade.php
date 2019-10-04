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
              @foreach($post->images as $image)
                <div class="card p-3 mb-3 imagePreview" data-id="{{ $image->id }}">
                    <img src="{{$image->source}}" class="card-img-top">
                </div>
                
              @endforeach
            </div>
            <div class="col-6 bg-white p-4">
              <form method="POST" action="{{route('admin.addWatermark', $post)}}">
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
              <input type="hidden" name="images" id="addWatermarkInput">
              <input type="hidden" name="post_id" value="{{$post->id}}">
              <button type="submit" id='btnMakeWatermark' class="btn btn-primary">Применить</button>
              </form>
              <hr>

              <div class="card bg-dark" style="width: 18rem;">
                <img src="/logo2.png" alt="Park" class="card-img-top p-3">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>

            </div>
          </div>
        </div>
      

      

    </section>
    <!-- /.content -->
@endsection


@section('imagesWatermark')
<script>
 localStorage.addWatermark = false;
 if(localStorage.addWatermark === true) {
    localStorage.addWatermark = false;
    alarm(123);
    window.location.reload();
 }

  var imagesIdsArray = [];
  var addWatermarkInput = $('#addWatermarkInput');

  $(document).on('click', '.imagePreview', function(e){
    $(this).toggleClass('imagePreviewDark');
    var imageId = $(this).data('id');
    if(imagesIdsArray.indexOf(imageId) == -1){
       imagesIdsArray.push(imageId);
    } else {
      var index = imagesIdsArray.indexOf(imageId);
      imagesIdsArray.splice(index, 1);
    }

    addWatermarkInput.val(imagesIdsArray.join(', '))

    if(addWatermarkInput.val()) {
      localStorage.addWatermark = true;
    } else {
      localStorage.addWatermark = false;
    }

  }); 
</script>


@endsection
