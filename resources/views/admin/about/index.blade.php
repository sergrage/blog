@extends('layouts.admin')

@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Обо мне</h1>
    <a class="btn btn-success" href="{{route('admin.upload') }}"><i class="fas fa-file-image"></i> Добавить фотографии</a>
    <a class="btn btn-primary" href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i> Вернуться обратно</a>
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <form action="{{route('admin.about.store')}}" method="post" accept-charset="utf-8" class="cabinet-content__form">
        @csrf
        <div class="form-group">
          <label for="editor">Текст</label>
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

{{--       <form method="POST" id="uploadForm" action="{{route('admin.upload')}}" enctype="multipart/form-data">
      @csrf  
      <div class="row">
        <div class="col-md-3">
          <h4>Выберите изображения</h4>
        </div>
        <div class="col-md-6">
          <input type="file" name="file[]" id='file' accept='image/*' multiple>
        </div>
        <div class="col-md-3">
          <button type="submit" id="#uploadBtn" class="btn btn-success">test</button>
        </div>
      </div>
      </form>
      <br>
      <div class="progress">
        <div class="progress-bar" aria-valuenow="" aria-valuemin="0" ariavaluemax="100" style="width: 0%">
          0%
        </div>
      </div>
      <br>
      <div id="successMessage" class="row">
        
      </div>
      <br> --}}
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@include('ckfinder::setup')
@section('ClassicEditor')

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script> --}}

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

//$(document).ready(function(){
  // $('#uploadForm').ajaxForm({
  //   beforSend:function(){
  //     $("successMessage").empty();
  //     $('.progress-bar').text('0%');
  //     $('.progress-bar').css('width', '0%');
  //   },
  //   uploadProgress:function(e, position, total, percentComplete){
  //     $('.progress-bar').text(percentComplete + '0%');
  //     $('.progress-bar').css('width', percentComplete + '0%');
  //   },
  //   success:function(data){
  //     console.log('im here');
  //     console.log(data.success);
  //     if(data.success){
  //       $("successMessage").html('<div class="text-success text-center"><b> '+data.success+ '</b></div><br/><br/>');
  //       $("successMessage").append(data.image);
  //       $('.progress-bar').text('Фотографии Загружены');
  //       $('.progress-bar').css('width', '100%');
  //     }


  //   }
//  });
// $(document).on('click', '#uploadBtn', function(e){
//   alarm(123);
//     $.ajax({
//         url: "/administrator/about/upload",
//         type: "POST",
//         data: {
//           testData :  'qwerty' 
//         },
//         headers:{
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         success: function(data)
//         {
//           // добавляем изображения
//           $('.imageContent').html(data);

//         },
//         error: function(){
//           alert('Что-то пошло не так!');
//         }
//     });
  


// });
 
</script>
    
@endsection