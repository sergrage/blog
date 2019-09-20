@extends('layouts.admin')

@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Редактировать статью</h1>
    <a class="btn btn-primary" href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i> Вернуться обратно</a>
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <form action="{{route('admin.posts.update', $post)}}" method="post" accept-charset="utf-8" class="cabinet-content__form">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="cardName">Название статьи</label>
          <input name="title" id="name" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Введите название статьи" value="{{ $post->title }}">
              @if ($errors->has('title'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('title') }}</strong>
                  </span>
              @endif
        </div>
        <div class="form-group">
          <label for="tagsSelect">Выберите тэги</label>
          <select class="select2 form-control" name="tags[]" multiple="multiple" id="tagsSelect" style="width: 100%">
            @foreach($tags as $tag)
              <option 
                @if(in_array($tag->id, $tagsListId))
                  selected
                @endif
              >
                {{ $tag->name }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="form-group my-4" id="ckfinder-widget">
            <input type="text" size="48" name="image" id="imageUrl" class="d-none form-control-file" value="{{ $post->image }}"/>
            <label onclick="openPopup()" for="imageUrl"  class="custom-file-upload">Выберите фотографию</label>
            @if ($errors->has('image'))
              <span class="invalid-feedback d-inline">
                  <strong>{{ $errors->first('image') }}</strong>
              </span>
            @endif
            <div id="postImageUpload" style="text-align: center;">
              <img src="{{ $post->image }}" class="img-thumbnail" alt="avatar"/>
              <div style="text-align: left;">
              <label class="mt-3" for="imageAlt"><span class="text-danger">*</span> Альтернативное описание фотографии</label>
              <input id='imageAlt' type='text' name='imageAlt' class='form-control' placeholder='Введите описание фотографии' value="{{ $post->imageAlt }}">
              @if ($errors->has('imageAlt'))
                <span class="invalid-feedback d-inline">
                    <strong>{{ $errors->first('imageAlt') }}</strong>
                </span>
              @endif
            </div>
            </div>
          </div>
        <div class="form-group">
            <label for="textPreview">Текст превью для отображения статьи на первой странице сайта</label>
            <textarea name="textPreview" id="textPreview" class="form-control{{ $errors->has('textPreview') ? ' is-invalid' : '' }}" onkeyup="countChars('textPreview','charcount');" onkeydown="countChars('textPreview','charcount');" onmouseout="countChars('textPreview','charcount');">{{$post->textPreview}}</textarea>
            <small class="form-text text-muted">Введите от 100 до 255 символов</small>
            <span id="charcount" class="badge badge-success">{{mb_strlen($post->textPreview)}} символов введено</span>
            @if ($errors->has('textPreview'))
              <span class="invalid-feedback">
                  <strong>{{ $errors->first('textPreview') }}</strong>
              </span>
            @endif
        </div>

        <div class="form-group">
          <label for="editor">Текст</label>
          <textarea name="body" id="editor" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}">{{ $post->body }}</textarea>
              @if ($errors->has('body'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('body') }}</strong>
                  </span>
              @endif
        </div>
        <div class="form-group form-check">
          <input type="checkbox" name="public" class="form-check-input" id="publicCheck" {{$post->checked()}}>
          <label class="form-check-label" for="publicCheck">Опубликовать</label>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Сохранить</button>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@include('ckfinder::setup')
@section('ClassicEditor')

<script>

function openPopup() {
   CKFinder.popup( {
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