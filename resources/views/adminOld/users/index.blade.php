@extends('layouts.admin')

@section('content')
  
  @include('admin.partials._navigation')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Список пользователей</h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href=" {{route('users.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Добавить нового пользователя</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Имя</th>
                  <th>E-mail</th>
                  <th>Аватар</th>
                  <th>Управление</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
	                <tr>
	                  <td>{{$user->id}}</td>
	                  <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
	                  <td><img src="{{$user->getAvatar()}}" alt="аватар пользователя" width="80"></td>
                    <td>
                      @if(!$user->isRoot())
                      <a href="{{ route('users.edit', $user) }}" class="btn btn-primary btn-sm m-0 p-1">Редактировать</a>
                      <form class="d-inline" method="POST" action="{{ route('users.destroy', $user) }}" class="mr-1">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm m-0 p-1">Удалить</button>
                      </form>
                      @else
                      <p>Редактирование пользователя не возможно</p>
                      @endif
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