@extends('layouts.admin')

@section('content')
  
  @include('admin.partials._navigation')

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
              <form action="{{route('posts.store')}}" method="post" accept-charset="utf-8" class="cabinet-content__form">
                @csrf
                <div class="form-group">
                  <label for="cardName">Название статьи</label>
                  <input name="title" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Введите название статьи" value="{{ old('name') }}">
                      @if ($errors->has('title'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('title') }}</strong>
                          </span>
                      @endif
                </div>
<!--                 <div class="form-group">
                    <label for="parent" class="col-form-label">Ключевые слова</label>
               
                </div> -->
                
                <div class="form-group">
                  <label for="editor">Текст</label>
                  <textarea name="body" id="editor" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}">{{ old('body') }}</textarea>
                      @if ($errors->has('body'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('body') }}</strong>
                          </span>
                      @endif
                </div>
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