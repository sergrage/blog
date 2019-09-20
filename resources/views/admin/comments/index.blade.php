@extends('layouts.admin')

@section('content')
  
    <!-- Main content -->
    <section class='content'>
          <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список комментариев</h1>
      </div>
      
      <table id="dataTable" width="100%" cellspacing="0" class='table table-bordered table-striped'>
        <thead>
        <tr>
          <th>ID</th>
          <th>Имя</th>
          <th>Дата создания</th>
          <th>Комментарий</th>
          <th>Ответ</th>
          <th>Статус</th>
          <th>Действие</th>
        </tr>
        </thead>
        <tbody>
          @foreach($comments as $comment)
          <tr>
            <td>{{$comment->id}}</td>
            <td><b>{{$comment->name}}</b></td>
            <td>
              <span class="badge badge-secondary m-1">{{$comment->created_at}}</span>
            </td>
            <td>{{$comment->text}}</td>
            <td>{{$comment->answer}}

             @if ($errors->has('answer'))
                <span class="invalid-feedback d-block"><strong>{{ $errors->first('answer') }}</strong></span>
             @endif
            </td>
            <td>
              @if($comment->isActive())
                <span class="badge badge-success m-1">Опубликовано</span>
              @else
                <span class="badge badge-warning m-1">Не Опубликовано</span>
              @endif
            </td>
            <td>
                <div class="btn-group-vertical">
                  <button class="btn btn-primary btn-block btn-sm m-1 comment-answer-btn" data-id="{{ $comment->id }}" data-toggle="modal" data-target="#modalAnswer"><i class="fas fa-edit"></i> Ответить</button>
                  @if($comment->isActive())
                  <form class="d-inline" action="{{ route('admin.comments.ban', $comment) }}" method="POST"> 
                    @csrf
                    <button class="btn btn-warning btn-block btn-sm m-1"><i class="fas fa-ban"></i> Снять</button>
                  </form>
                  @else
                  <form class="d-inline" action="{{ route('admin.comments.unBan', $comment) }}" method="POST"> 
                    @csrf
                    <button class="btn btn-success btn-block btn-sm m-1"><i class="fas fa-check-circle"></i> Опубликовать</button>
                  </form>
                  @endif
                  <form class="d-inline w-100" method="POST" action="{{ route('admin.comments.destroy', $comment) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-block btn-sm m-1"><i class="fas fa-trash-alt"></i> Удалить</button>
                  </form>
               </div>
            </td>
          </tr>
        @endforeach
        </tboby>
        </table>
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="modalAnswer" tabindex="-1" role="dialog" aria-labelledby="modalAnswer" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Ответить на комментарий</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form  action="{{ route('admin.comments.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <textarea class="form-control" name="answer" rows="3"></textarea>

              </div>
              
              <input type="hidden" name="id" id="commentIdInput">

              <div class="modal-footer">
<!--                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button> -->
                <button type="submit" class="btn btn-primary">Сохранить</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('modalCommentAnswer')
<script>
  
$('body').click(function(e){
  if(e.target.nodeName == 'BUTTON' && $(e.target).hasClass('comment-answer-btn')) {
    // Id комментария.
    var commentId = $(e.target).data('id');
    // input куда добавляется id комментария
    var commentIdInput = $('#commentIdInput');
    // в value добавляется Id
    commentIdInput.val(commentId);
  }
});
</script>
@endsection