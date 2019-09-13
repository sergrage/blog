@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Список пользователей</h1>
    <a href=" {{route('admin.users.create')}}" class="btn btn-success"><i class="fas fa-user-plus"></i> Добавить нового пользователя</a>
  </div>
  <!-- Main content -->
  <div class="row">
    <table class="table table-bordered table-striped">
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
          <td><img class="rounded-circle" src="{{$user->getAvatar()}}" alt="аватар пользователя" width="60"></td>
          <td>
            @if(!$user->isRoot())
            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-sm m-0 p-1">Редактировать <i class="fas fa-user-edit"></i></a>
            <form class="d-inline" method="POST" action="{{ route('admin.users.destroy', $user) }}" class="mr-1">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm m-0 p-1">Удалить <i class="fas fa-user-slash"></i></button>
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
  <!-- /.content -->

@endsection