@extends('layouts.admin')

@section('content')
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{ $post->title }}</h1>
    </section>

    <!-- Main content -->
    <section class="content">
    
    {!! $post->addBootstrap($post->body) !!}
     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

   
