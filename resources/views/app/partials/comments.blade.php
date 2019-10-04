@if($post->commentsProvenCount())
<div class="section-row">
    <div class="section-title">
        <h3 class="title">{{ $post->commentsProvenCount() }} {{ true_wordform($post->commentsProvenCount(), 'Комментариев', 'Комментарий', 'Комментария', 'Комментариев') }}</h3>
    </div>
    <div class="post-comments">
        @foreach($post->comments as $comment)
            @if($comment->status == 'active')
        <!-- comment -->
        <div class="media">
            <div class="media-left">
              
            </div>
            <div class="media-body">
                <div class="media-heading">
                    <h4>{{$comment->name}}</h4>
                    <span class="time">{{$comment->createdAtForHumans()}}</span>
                </div>
                <p>{{$comment->text}}</p>
                @if($comment->answer)
                <!-- comment -->
                <div class="media media-author">
                    <div class="media-left">
                        
                    </div>
                    <div class="media-body">
                        <div class="media-heading">
                            <h4>Виктория</h4>
                            <span class="time">{{$comment->answeredAtForHumans()}}</span>
                        </div>
                        <p>{{$comment->answer}}</p>

                    </div>
                </div>
                @endif
                <!-- /comment -->
            </div>
        </div>
        @endif
        <!-- /comment -->
        @endforeach
    </div>
</div>
@endif