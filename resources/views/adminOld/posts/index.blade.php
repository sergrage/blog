@extends('layouts.admin')

@section('content')
  
  @include('admin.partials._navigation')

  <!-- Content Wrapper. Contains page content -->
  <div class='content-wrapper'>
    <!-- Content Header (Page header) -->
    <section class='content-header'>
      <h1>Список статей</h1>
    </section>

    <!-- Main content -->
    <section class='content'>

      <!-- Default box -->
      <div class='box'>
            <!-- /.box-header -->
            <div class='box-body'>
              <div class='form-group'>
                <a href=' {{route('posts.create')}}' class='btn btn-success'><i class='fa fa-plus'></i> Добавить новый пост</a>
              </div>
              <div class='row'>
                <div class='col-md-9'>
                </div>
                <div class='col-md-3'>
                 <div class='form-group'>
                  <input placeholder="Поиск" type='text' name='serach' id='serach' class='form-control' />
                 </div>
                </div>
               </div>
              <table id='example1' class='table table-bordered table-striped'>
                <thead>
                <tr>
                  <th width='5%' class='sorting' data-sorting_type='desc' data-column_name='id' style='cursor: pointer'>ID <span id='id_icon'><i class="fa fa-sort"></i></span></th>
                  <th class='sorting' data-sorting_type='desc' data-column_name='title' style='cursor: pointer'>Заголовок <span id='title_icon'><i class="fa fa-sort"></i></span></th>
                  <th>Дата создания</th>
                  <th>Просмотры</th>
                  <th>Статус</th>
                  <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @include('admin.partials._pagination_data')
                </tboby>
                </table>
            </div>
            <input type='hidden' name='hidden_page' id='hidden_page' value='1' />
            <input type='hidden' name='hidden_column_name' id='hidden_column_name' value='id' />
            <input type='hidden' name='hidden_sort_type' id='hidden_sort_type' value='asc' />
            <!-- /.box-body -->
          </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('postSearch')
  @include('admin.partials._postSearchScript')
@endsection