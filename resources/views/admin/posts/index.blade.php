@extends('layouts.admin')

@section('content')
  
    <!-- Main content -->
    <section class='content'>
          <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Список статей</h1>
    <a href=" {{route('admin.posts.create') }}" class='btn btn-success'><i class='fa fa-plus'></i> Добавить новую статью</a>
  </div>
      
      <table id="dataTable" width="100%" cellspacing="0" class='table table-bordered table-striped'>
        <thead>
        <tr>
          <th>ID</th>
          <th>Заголовок</th>
          <th>Дата создания</th>
          <th>Просмотры</th>
          <th>Статус</th>
          <th>Действие</th>
        </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td><b>{{$post->title}}</b></td>
            <td><span class="badge badge-secondary m-1">{{$post->created_at}}</span></td>
            <td>{{$post->views}}</td>
            <td>
              @if($post->public == 'on')
                <span class="badge badge-success m-1">Опубликовано</span>
              @else
                <span class="badge badge-warning m-1">Не Опубликовано</span>
              @endif
            </td>
        <!--     <td>
              {!! $post->previewbody($post->body) !!}
            </td> -->
            <td>
                <div class="btn-group-vertical">

                    <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-info btn-block btn-sm m-1">Просмотреть</a>

                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary btn-block btn-sm m-1">Редактировать</a>

                    <form class="d-inline w-100" method="POST" action="{{ route('admin.posts.destroy', $post) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-block m-1 btn-sm">Удалить</button>
                    </form>
               </div>
            </td>
          </tr>
        @endforeach
        </tboby>
        </table>
    </section>
    <!-- /.content -->
@endsection
