@extends('layouts.admin')

@section('content')
          <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Добавить новый элемент в портфолио</h1>
    <a class="btn btn-primary" href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i> Вернуться обратно</a>
  </div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Multi step form --> 
      <form action="{{route('admin.portfolio.store')}}" method="post" accept-charset="utf-8" class="cabinet-content__form">
        @csrf
        <h3><b>Шаг 1.</b> Введите заголовок и текст превью</h3>
        <div class="form-group">
          <label for="cardName"><b>Введите название</b></label>
          <input name="title" id="name" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"  value="{{ old('title') }}">
            @if ($errors->has('title'))
              <span class="invalid-feedback">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
            @endif
        </div>
        <hr>
        <h3><b>Шаг 1.</b>Опишите работу</h3>
        <div class="form-group">
          <label for="editor">Описание работы</label>
          <textarea name="body" id="editor" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}">{{ old('body') }}</textarea>
            @if ($errors->has('body'))
              <span class="invalid-feedback">
                  <strong>Не заполнено портфолио</strong>
              </span>
            @endif
        </div>
        <hr>
        <h3><b>Шаг 3.</b> Нажмите опубликовать или оставьте в черновиках</h3>
        <div class="form-group form-check">
            <input type="checkbox" name="public" class="form-check-input" id="publicCheck">
            <label class="form-check-label" for="publicCheck">Опубликовать</label>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Сохранить</button>
     </form>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


@section('ClassicEditor')

@include('ckfinder::setup')


<script>

function openPopup() {
   CKFinder.popup( {
       language: 'ru',
       chooseFiles: true,
       onInit: function( finder ) {
           finder.on( 'files:choose', function( evt ) {
               var file = evt.data.files.first();
               document.getElementById( 'imageUrl' ).value = file.getUrl();
               // document.getElementById( 'imageName' ).innerHTML = "Выбрана фотография " + file.getUrl();

              $.ajax({
                url: "/administrator/posts/postImageUpload",
                type: "POST",
                data: {
                  url :  document.getElementById( 'imageUrl' ).value
                },
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                    success: function(data)
                {
                    $('#postImageUpload').html(data);
                },
                error: function(){

                  alert('Что-то пошло не так!');
                }
            });


           } );
           finder.on( 'file:choose:resizedImage', function( evt ) {
               document.getElementById( 'imageUrl' ).value = evt.data.resizedUrl;
           } );
       }
   } );

   // var url  = document.getElementById( 'imageUrl' ).value;
}

ClassicEditor
  .create( document.querySelector( '#editor' ), {
  })
  .then( editor => {
      window.editor = editor;
  })
  .catch( error => {
      console.error( error );
  });

 
</script>
   
@endsection