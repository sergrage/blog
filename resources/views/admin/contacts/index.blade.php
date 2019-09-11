@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Записаться на прием</h1>
      <ul class="nav nav-tabs mt-3">
        <li class="nav-item">
          <a class="nav-link active" href="{{route('admin.contacts')}}">Контакты</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('admin.adress')}}">Настройка карты</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.preview')}}">Предпросмотр</a>
        </li>
      </ul>
  </div>

    <!-- Main content -->
    <section class="content">

     <form action="{{route('admin.contacts.store')}}" method="post" accept-charset="utf-8" class="cabinet-content__form">
        @csrf
        <div class="form-group">
          <label for="editor">Текст</label>
          <textarea name="body" id="editor" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}">{{ $contacts->body }}</textarea>
              @if ($errors->has('body'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('body') }}</strong>
                  </span>
              @endif
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Сохранить</button>
      </form>

    </section>
    <!-- /.content -->

@endsection

@include('ckfinder::setup')
@section('ClassicEditor')

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