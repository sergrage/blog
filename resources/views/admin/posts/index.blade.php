@extends('layouts.admin')

@section('content')
  
  @include('admin.partials._navigation')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Список статей</h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href=" {{route('posts.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Добавить новый пост</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="d-flex">
                  <th class="col-1">ID</th>
                  <th class="col-1">title</th>
                  <th class="col-6">body</th>
                  <th class="col-1">Опубликовано</th>
                  <th class="col-1">Создано</th>
                  <th class="col-2">Действие</th>

                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                  <tr class="d-flex">
                    <td class="col-1">{{$post->id}}</td>
                    <td class="col-1">{{$post->title}}</td>
                    <td class="col-6">{!! $post->html_cut($post->body, 550) !!}</td>
                    <td class="col-1">
                      @if($post->public == 'on')
                        <span class="badge badge-success">Опубликовано</span>
                      @else
                        <span class="badge badge-warning">Не Опубликовано</span>
                      @endif
                    </td>
                    <td class="col-1">
                      {{$post->created_at}}
                    </td>
                    <td class="col-2">
                      <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-sm m-0 p-1">Редактировать</a>
                      <form class="d-inline" method="POST" action="{{ route('posts.destroy', $post) }}" class="mr-1">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm m-0 p-1">Удалить</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
                </tboby>
              </table>


            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection