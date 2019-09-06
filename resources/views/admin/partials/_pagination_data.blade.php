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

            <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-block btn-sm m-1">Просмотреть</a>

            <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-block btn-sm m-1">Редактировать</a>

            <form class="d-inline w-100" method="POST" action="{{ route('posts.destroy', $post) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-block m-1 btn-sm">Удалить</button>
            </form>
       </div>
    </td>
  </tr>
@endforeach
 <tr>
 <td colspan="6" align="center">
  @if($isEmpty)
    <h2><b>У Вас нет статей.</b></h2>
  @endif
  {!! $posts->links() !!}
 </td>
</tr>
