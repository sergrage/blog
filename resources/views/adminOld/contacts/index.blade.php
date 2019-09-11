@extends('layouts.admin')

@section('content')
  
  @include('admin.partials._navigation')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Записаться на прием</h1>
      <ul class="nav nav-tabs mt-3">
        <li class="nav-item">
          <a class="nav-link active" href="{{route('admin.contacts')}}">Контакты</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.adress')}}">Настройка карты</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.contacts')}}">Предпросмотр</a>
        </li>
<!--         <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li> -->
      </ul>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
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
            <!-- /.box-body -->
          </div>
      </div>
      <!-- /.box -->
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

<!-- <script>
  
$(document).ready(function(){

function fetch_data_yandex(query) {
    $.ajax({
    url:'/administrator/fetchData?page='+page+'&sortby='+sort_by+'&sorttype='+sort_type+'&query='+query,
    headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
   success:function(data)
   {

    $('tbody').html('');

    $('tbody').html(data);

   }
  })
}


$(document).on('keyup', '#adress', function(){
  var query = $('#adress').val();
  fetch_data_yandex(query);
});

})


</script> -->
    
@endsection