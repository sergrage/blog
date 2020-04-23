@extends('layouts.admin')

@section('content')
  
    <!-- Main content -->
    <section class='content'>
          <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список комментариев</h1>
      </div>
      
      <table id="dataTable" width="100%" cellspacing="0" class='table table-bordered'>
        <thead>
        <tr>
          <th>ID</th>
          <th>Имя</th>
          <th>Дата создания</th>

          <th>Отзыв</th>
          <th>Ответ</th>
          <th>Время ответа</th>
          <th>Статус</th>
          <th>Действие</th>
        </tr>
        </thead>
        <tbody>
          @foreach($reviews as $review)
          <tr  @if(!$review->proven) style="background-color:rgba(0, 0, 0, 0.1)"  @endif>
            <td>{{$review->id}}</td>
            <td><b>{{$review->name}}</b></td>
            <td>
              <span class="badge badge-secondary m-1">{{$review->created_at}}</span>
            </td>

            <td>{{$review->text}}</td>
            <td>{{$review->answer}}

             @if ($errors->has('answer'))
                <span class="invalid-feedback d-block"><strong>{{ $errors->first('answer') }}</strong></span>
             @endif
            </td>
            <td>
              <span class="badge badge-secondary m-1">{{$review->answered_at}}</span>
            </td>
            <td>
              @if($review->isActive())
                <span class="badge badge-success m-1">Опубликовано</span>
              @else
                <span class="badge badge-warning m-1">Не Опубликовано</span>
              @endif
            </td>
            <td>
                <div class="btn-group-vertical">
                  <button class="btn btn-primary btn-block btn-sm m-1 review-answer-btn" data-id="{{ $review->id }}" data-toggle="modal" data-target="#modalAnswer"><i class="fas fa-edit"></i> Ответить</button>
                  @if($review->isActive())
                  <form class="d-inline" action="{{ route('admin.reviews.ban', $review) }}" method="POST"> 
                    @csrf
                    <button class="btn btn-warning btn-block btn-sm m-1"><i class="fas fa-ban"></i> Снять</button>
                  </form>
                  @else
                  <form class="d-inline" action="{{ route('admin.reviews.unBan', $review) }}" method="POST"> 
                    @csrf
                    <button class="btn btn-success btn-block btn-sm m-1"><i class="fas fa-check-circle"></i> Опубликовать</button>
                  </form>
                  @endif
                  <form class="d-inline w-100" method="POST" action="{{ route('admin.reviews.destroy', $review) }}">
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
            <form  action="{{ route('admin.reviews.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <textarea class="form-control" name="answer" rows="3"></textarea>

              </div>
              
              <input type="hidden" name="id" id="reviewIdInput">

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
  if(e.target.nodeName == 'BUTTON' && $(e.target).hasClass('review-answer-btn')) {
    // Id комментария.
    var reviewId = $(e.target).data('id');
    // input куда добавляется id комментария
    var reviewIdInput = $('#reviewIdInput');
    // в value добавляется Id
    reviewIdInput.val(reviewId);
  }
});
</script>
@endsection