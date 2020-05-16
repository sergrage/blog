@extends('layouts.admin')

@section('content')
          <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Добавить новую статью</h1>
    <a class="btn btn-primary" href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i> Вернуться обратно</a>
  </div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Multi step form --> 
      <form action="{{route('admin.posts.store')}}" method="post" accept-charset="utf-8" class="cabinet-content__form">
        @csrf
        <h3><b>Шаг 1.</b> Введите заголовок и текст статьи</h3>
        <div class="form-group">
          <label for="cardName">Название статьи</label>
          <input name="title" id="name" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Введите название статьи" value="{{ old('title') }}">
            @if ($errors->has('title'))
              <span class="invalid-feedback">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
            @endif
        </div>
        <div class="form-group">
          <label for="editor">Текст</label>
          <textarea name="body" id="editor" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}">{{ old('body') }}</textarea>
            @if ($errors->has('body'))
              <span class="invalid-feedback">
                  <strong>{{ $errors->first('body') }}</strong>
              </span>
            @endif
        </div>
        <hr>
          <h3><b>Шаг 2.</b> Выберите фотографию и введите превью</h3>
          <div class="form-group my-4" id="ckfinder-widget">
            <input type="text" size="48" name="image" id="imageUrl" class="d-none form-control-file"/>
            <label onclick="openPopup()" for="imageUrl"  class="custom-file-upload">Выберите фотографию</label>
            @if ($errors->has('image'))
              <span class="invalid-feedback d-inline">
                  <strong>{{ $errors->first('image') }}</strong>
              </span>
            @endif
            <div id="postImageUpload" style="text-align: center;"></div>
          </div>
          <div class="form-group">
            <label for="textPreview">Текст превью для отображения статьи на первой странице сайта</label>
            <textarea name="textPreview" id="textPreview" class="form-control{{ $errors->has('textPreview') ? ' is-invalid' : '' }}" onkeyup="countChars('textPreview','charcount', 100, 255);" onkeydown="countChars('textPreview','charcount');" onmouseout="countChars('textPreview','charcount');">{{ old('textPreview') }}</textarea>
            <small class="form-text text-muted">Введите от 100 до 255 символов</small>
            <span id="charcount" class="badge badge-danger">0 символов введено</span>
            @if ($errors->has('textPreview'))
              <span class="invalid-feedback">
                  <strong>{{ $errors->first('textPreview') }}</strong>
              </span>
            @endif
        </div>
        <hr>
        <h3><b>Шаг 3.</b> Выберите тэги для статьи</h3>
        <div class="form-group">
          <label for="tagsSelect">Выберите тэги</label>
          <select class="select2 form-control" name="tags[]" multiple="multiple" id="tagsSelect" style="width: 100%">
            @foreach($tags as $tag)
              <option>{{ $tag->name }}</option>
            @endforeach
          </select>
        </div>
        
        <hr>
        <h3><b>Шаг 4.</b> Нажмите опубликовать или оставьте статью в черновиках</h3>
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