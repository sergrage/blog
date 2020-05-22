@extends('layouts.admin')

@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Добавьте фотографии к вашему партфолио</h1>
    <a class="btn btn-primary" href="{{ route('admin.portfolio.index') }}"><i class="fas fa-arrow-left"></i> Назад</a>

  </div>
  <h3>{{$portfolio->title}}</h2>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="panel panel-default pt-5">

          <div class="panel-body">
              <form method="post" action="{{ route('admin.portfolioUpload.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">

                      <div class="col-md-3">
                          <label for="file" class="custom-file-upload">Выберите фотографию</label>
                          <input type="file" class="d-none" name="file[]" id="file" accept="image/*" multiple />
                          @if ($errors->has('file'))
                            <div class="invalid-feedback d-block">
                                <strong>{{ $errors->first('file') }}</strong>
                            </div>
                          @endif
                          <div class="fileName">
                            
                          </div>
                      </div>
                      <input type="hidden" name="id" value="{{ $portfolio->id }}">  
                      <div class="col-md-3">
                          <input type="submit" name="upload" value="Загрузите фотографии" class="btn btn-success" />
                      </div>
                      <div class="col-md-3">
                          <a href="{{ route('admin.watermarkPortfolio', $portfolio) }}" class="btn btn-warning" /><i class="far fa-file-image"></i> Защита фото</a>
                      </div>
                  </div>
              </form>
              <br />
              <div class="row">
              @foreach($portfolio->photos as $photo)
                <div class="col-md-3">
                  <div class="card m-1">
                    <a data-fancybox="images" href="{{ $photo->path}}" ><img src="{{ $photo->path}}" class="p-2 img-fluid"></a>
                    <div class="card-body">
                      <form action="{{ route('admin.portfolioUpload.update', $photo)}}" method="POST" class="form-inline">
                      @csrf
                      @method('PUT')
                      <input type="text" name="alt" class="form-control" value="{{$photo->alt}}" style="width:80%">
                      <input type="hidden" name="id" value="{{ $portfolio->id }}">  
                      <button class="btn btn-primary" type="submit" style="margin-left:-5px;">
                        <i class="fas fa-edit"></i>
                      </button>
                      </form>
                      <form class="d-inline w-100" method="POST" action="{{ route('admin.portfolioUpload.destroy', $photo)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-block btn-sm m-1"><i class="fas fa-trash-alt"></i> Удалить</button>
                      </form>
                    </div>
                  </div>
                </div>
              @endforeach
              </div>
          </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


@section('deleteImage')

<script>
  
const inputElement = document.getElementById("file");
inputElement.addEventListener("change", handleFiles, false);
function handleFiles() {
  const fileList = this.files; 
  const fileNumber = fileList.length;
 for (var i = 0; i < fileNumber; i++) {
    $('.fileName').append( "<p>"+fileList[i]['name']+"</p>" );
  }
}

</script>
@endsection