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

      <br />

      <div class="container">    
      <br />
      <h3 align="center">Загрузка изображений, для отображения на странице "Обо мне"</h3>
      <br />
      <div class="panel panel-default">
          <div class="panel-body">
              <br />
              <form method="post" action="{{ route('admin.aboutUpload.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                      <div class="col-md-6">
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
                      <div class="col-md-6">
                          <input type="submit" name="upload" value="Загрузите фотографии" class="btn btn-success" />
                      </div>
                  </div>
              </form>
              <br />
              <div class="row">
              @foreach($about->photos as $photo)
                <div class="col-md-3">
                  <div class="card m-1">
                    <a data-fancybox="images" href="{{ $photo->path}}" ><img src="{{ $photo->path}}" width="300px" class="p-2 img-fluid" alt="{{ $photo->alt }}"></a>
                    <div class="card-body">
                      <form action="{{ route('admin.aboutUpload.update', $photo)}}" method="POST" class="form-inline">
                      @csrf
                      @method('PUT')
                      <input type="text" name="alt" class="form-control" value="{{$photo->alt}}" style="width:80%">
                      <button class="btn btn-primary" type="submit" style="margin-left:-5px;">
                        <i class="fas fa-edit"></i>
                      </button>
                      </form>
                      <form class="d-inline w-100" method="POST" action="{{ route('admin.aboutUpload.destroy', $photo) }}">
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