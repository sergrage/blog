@extends('layouts.admin')

@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Обо мне</h1>
    <a class="btn btn-success" href="{{route('admin.aboutUpload.index') }}"><i class="fas fa-file-image"></i> Добавить фотографии</a>
    <a class="btn btn-primary" href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i> Вернуться обратно</a>
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <form action="{{route('admin.about.store')}}" method="post" accept-charset="utf-8" class="cabinet-content__form">
        @csrf
        <div class="form-group">
          <textarea name="body" id="editor" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}">{{ $about->body}}</textarea>
        @if ($errors->has('body'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Сохранить</button>
      </form>

      <br>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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