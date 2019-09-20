@extends('layouts.admin')

@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Добавить статью</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="{{route('admin.posts.store')}}" method="post" accept-charset="utf-8" class="cabinet-content__form">
        @csrf
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
        <div class="form-group col-md-12" id="ckfinder-widget">
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
          <label for="tagsSelect">Выберите тэги</label>
          <select class="select2 form-control" name="tags[]" multiple="multiple" id="tagsSelect">
            @foreach($tags as $tag)
              <option>{{ $tag->name }}</option>
            @endforeach
          </select>
        </div>
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