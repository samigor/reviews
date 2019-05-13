@extends('layouts.app')

@section('content')
    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        @foreach($articles as $article)
                        <div class="col-md-6">
                            <article class="post post-grid">
                                <div class="post-thumb">
                                    <a href="{{route('article.show', $article->slug)}}"><img src="{{$article->getImage()}}" alt=""></a>

                                    <a href="{{route('article.show', $article->slug)}}" class="post-thumb-overlay text-center">
                                        <div class="text-uppercase text-center">View Post</div>
                                    </a>
                                </div>
                                <div class="post-content">
                                    <header class="entry-header text-center text-uppercase">
                                        <h6><a href="{{route('category.show', $article->categories()->pluck('slug')->implode(', '))}}"> {{$article->categories()->pluck('title')->implode(', ')}}</a></h6>

                                        <h1 class="entry-title"><a href="{{route('article.show', $article->slug)}}">{{$article->title}}</a></h1>
                                    </header>
                                    <div class="entry-content">
                                        {!! $article->description_short !!}

                                        <div class="social-share">
                                            <span class="social-share-title pull-left text-capitalize">{!! $article->created_at !!}</span>
                                        </div>
                                    </div>
                                </div>

                            </article>
                        </div>
                        @endforeach
                    </div>
                    {{$articles->links()}}

                </div>
               @include('sidebar')
        </div>
    </div>
    <!-- end main content-->
@endsection