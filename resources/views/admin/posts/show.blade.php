@extends('layouts.admin')

@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Просмотр статьи</h1>
    <a class="btn btn-primary" href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i> Вернуться обратно</a>
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{ $post->title }}</h1>
    </section>

    <!-- Main content -->
    <section class="content ck-content1">
    
    {!! $post->addBootstrap($post->body) !!}

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

   
