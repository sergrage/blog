@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Портфолио</h1>
    <a href=" {{route('admin.portfolio.create')}}" class="btn btn-success"><i class="fas fa-plus-square"></i></i></i> Добавить</a>
  </div>
  <!-- Main content -->
  <div class="row">
    <table class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Id</th>
        <th>Заголовок</th>
        <th>Текст Превью</th>
        <th>Просмотры</th>
        <th>Статус</th>
        <th>Действие</th>
      </tr>
      </thead>
      <tbody>
      @foreach($portfolios as $portfolio)
        <tr>
          <td>{{$portfolio->id}}</td>
          <td>{{$portfolio->title}}</td>
          <td>{{$portfolio->textPreview}}</td>
          <td>{{$portfolio->views}}</td>
          <td>
              @if($portfolio->public == 'on')
                <span class="badge badge-success m-1">Опубликовано</span>
              @else
                <span class="badge badge-warning m-1">Не Опубликовано</span>
              @endif
  
          </td>
          <td>
            <a href="{{ route('admin.portfolioImage', $portfolio) }}" class="btn btn-secondary btn-sm m-0 p-1">Добавить фото <i class="fa fa-plus-circle"></i></a>
            <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="btn btn-primary btn-sm m-0 p-1">Редактировать <i class="fas fa-user-edit"></i></a>
            <form class="d-inline" method="POST" action="{{ route('admin.portfolio.destroy', $portfolio) }}" class="mr-1">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm m-0 p-1">Удалить <i class="fas fa-user-slash"></i></button>
            </form>
            @if($portfolio->public == 'on')
              <form class="d-inline w-100" method="POST" action="{{ route('admin.portfolio.ban', $portfolio) }}">
                  @csrf
                  <button class="btn btn-warning m-1 btn-sm">Снять с публикации</button>
              </form>
              @else
              <form class="d-inline w-100" method="POST" action="{{ route('admin.portfolio.unBan', $portfolio) }}">
                  @csrf
                  <button class="btn btn-success m-1 btn-sm">Опубликовать</button>
              </form>
              @endif
          </td>
        </tr>
      @endforeach
      </tboby>
    </table>
  </div>
  <!-- /.content -->

@endsection