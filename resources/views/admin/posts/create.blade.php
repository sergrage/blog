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

      <!-- Default box -->
      <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
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
                  <label for="upload_image"  class="custom-file-upload">Выберите фотографию</label>
                  <input type="file" class="d-none form-control-file" id="upload_image" name="image">
              </div>
              <script>
                


              </script>
                <div class="form-group form-check">
                  <input type="checkbox" name="public" class="form-check-input" id="publicCheck">
                  <label class="form-check-label" for="publicCheck">Опубликовать</label>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Сохранить</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


@section('ClassicEditor')

@include('ckfinder::setup')


<script>
  CKFinder.widget( 'ckfinder-widget', {
    width: '100%',
    height: 600
} );  
  
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