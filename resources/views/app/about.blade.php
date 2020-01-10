@extends('layouts.app')
@section('content')
    <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container ck-content1">
            <div class="row">
                <div class="col-12">
                    @isset($about)
                        {!! addBootstrap($about->body) !!}
                    @endisset

                    @empty($about)
                        <h3>Биография не добавлена на сайт</h3>
                    @endempty
                    
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection