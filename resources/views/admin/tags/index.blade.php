@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Список тэгов</h1>
    
  </div>
<form action="{{route('admin.tags.store')}}" method="post" accept-charset="utf-8" class="mb-4">
      @csrf
      <div class="form-group">
        <label for="cardName">Добавить новый тэг</label>
        <input name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Введите имя тэга" value="{{ old('name') }}">
            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
      </div>
      <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
  
  <hr>

  <!-- Main content -->

      <table id="dataTable" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>ID</th>
        <th>Тэг</th>
        <th>Редактировать</th>
        <th>Удалить</th>
      </tr>
      </thead>
      <tbody>
      @foreach($tags as $tag)
        <tr>
          <td>{{$tag->id}}</td>
          <td><span class="badge badge-secondary">{{$tag->name}}</<span></td>
          <td>
            <form action="{{ route('admin.tags.update', $tag) }}" method="POST" class="form-inline">
              @csrf
              @method('PUT')
                <div class="form-group">
                    <input type="text" name="name" class="form-control" value="{{$tag->name}}">
                </div>
                <button class="btn btn-primary" style="margin-left:-5px;"><i class="fas fa-edit"></i></button>
              </form>

          </td>
          <td>
            <form class="form-inline" method="POST" action="{{ route('admin.tags.destroy', $tag) }}" class="mr-1">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
            


          </td>
        </tr>
      @endforeach
      </tboby>
    </table>

  <!-- /.content -->

@endsection