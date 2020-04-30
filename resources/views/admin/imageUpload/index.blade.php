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

      <br>

      <div class="container">    
     <br />
     <h3 align="center">Laravel 5.8 - Multiple File Upload with Progressbar using Ajax jQuery</h3>
     <br />
     <div class="panel panel-default">
          <div class="panel-body">
              <br />
              <form method="post" action="{{ route('admin.upload.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                      <div class="col-md-3" align="right"><h4>Select Images</h4></div>
                      <div class="col-md-6">
                          <input type="file" name="file[]" id="file" accept="image/*" multiple />
                      </div>
                      <div class="col-md-3">
                          <input type="submit" name="upload" value="Загрузите фотографии" class="btn btn-success" />
                      </div>
                  </div>
              </form>
              <br />
              <div class="row">
                <div class="col-md-3">
                  @foreach($about->photos as $image)
                  
                  <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $image->path}}" alt="Card image cap">
                    <div class="card-body">
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
                  


                  @endforeach
                </div>    
              </div>
          </div>
      </div>
  </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection