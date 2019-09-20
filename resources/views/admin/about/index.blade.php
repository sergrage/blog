@extends('layouts.admin')

@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Обо мне</h1>
    <a class="btn btn-primary" href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i> Вернуться обратно</a>
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <form action="{{route('admin.about.store')}}" method="post" accept-charset="utf-8" class="cabinet-content__form">
        @csrf

    
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