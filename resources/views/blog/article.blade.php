@extends ('layouts.app')
@section ('title', $article->meta_title)
@section ('meta_keyword', $article->meta_keyword)
@section ('meta_description', $article->meta_description)
@section ('content')


<header class="masthead">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1><a href="/" title="Scroll down for your viewing pleasure">Новостной Блог</a>
          <p class="lead">Попытка сдать экзамен в WEZOM.</p></h1>
      </div>

    </div>
  </div>
</header>

<!-- Begin Body -->
<div class="container">
	<div class="no-gutter row">
      		<!-- left side column -->
  			<div class="col-md-2">
              	<div class="panel panel-default" id="sidebar">
                <div class="panel-heading" style="background-color:#888;color:#fff;">Боковое меню</div>
                <div class="panel-body">

                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                Комментарии
                            </a>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse in">
                          <div class="accordion-inner">
                              Комментариев (0)
                          </div>
                      </div>
                  </div>
                  <div class="accordion-group">
                          <div class="accordion-heading">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                  Теги
                              </a>
                          </div>
                          <div id="collapseTwo" class="accordion-body collapse">
                              <div class="accordion-inner">
                                <div class="decoration">
                                                              @foreach($article->tags as $tag)
                                                              <a href="{{route('tag.show', $tag->slug)}}" class="btn btn-default">{{$tag->title}}</a>
                                                              @endforeach
                                                          </div>
                              </div>
                            </div>
                        </div>

               	</div><!--/acc-->

                  <hr>



                </div><!--/panel body-->
              </div><!--/panel-->
      		</div><!--/end left column-->


      		<!-- right content column-->
      		<div class="col-md-7" id="content">
            	<div class="panel">
    			<div class="panel-heading" style="background-color:#111;color:#fff;">Последние новости</div>
              	<div class="panel-body">

                  <div class="row">
                    <div class="container">
                      <h1> {{$article->title}}</h1>
                      <p>{!!$article->description!!}</p>

                    </div>
                </div>



                  <div class="well text-center">
                                    </div>

                  <hr>

                  @if(!$article->comments->isEmpty())
                                        @foreach($article->comments as $comment)
                                            <div class="bottom-comment"><!--bottom comment-->
                                                <div class="comment-img">
                                                    <img class="img-circle" src="/images/comment.jpg" alt="" width="75" height="75">
                                                </div>

                                                <div class="comment-text">
                                                    <h5>{{$comment->author->name}}</h5>

                                                         <p class="comment-date">
                                                        {{$comment->created_at->diffForHumans()}}
                                                    </p>
                                                    <p class="para">{{$comment->text}}</p>
                                                </div>
                                               @include('admin.delmess')
                                            </div>

                                        @endforeach
                                    @endif
                                <!-- end bottom comment-->

                                 @if(Auth::check())
                                    <div class="leave-comment"><!--leave comment-->
                                        <h4>Оставьте комментарий</h4>


                                        <form class="form-horizontal contact-form" role="form" method="post" action="/comment">
                                            {{csrf_field()}}
                                            <input type="hidden" name="article_id" value="{{$article->id}}">
                                             <div class="form-group">
                                                <div class="col-md-12">
                										<textarea class="form-control" rows="6" name="message"
                                                                  placeholder="Напишите комментарий"></textarea>
                                                </div>
                                            </div>
                                            <button class="btn send-btn">Отправить</button>
                                        </form>
                                    </div><!--end leave comment-->
                                     @endif
                                </div>

                  </div><!--/panel-body-->
                </div><!--/panel-->
              	<!--/end right column-->
      	</div>
  	</div>
</div>


<footer>
  <div class="container">
  	<div class="row">
      <div class="col-md-12 text-right"><h5>©IGor 2019</h5></div>
    </div>
  </div>
</footer>

@endsection
