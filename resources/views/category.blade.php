@extends ('layouts.app')
@section ('title', $category->title . " WEZOM")
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
                                  Свежие новости в данной категории
                              </a>
                          </div>
                          <div id="collapseOne" class="accordion-body collapse in">
                            <div class="accordion-inner">
                          @forelse ($articles->reverse() as $article)
                          <p>
                           <a href="{{route('article', $article->slug)}}">{{$article->title}}</a>
</p>
                           @empty
                           @endforelse
                         {{$articles->links()}}
                            </div>
                        </div>
                    </div>
                
                  </div>

                    <hr>



                  </div><!--/panel body-->
                </div><!--/panel-->
        		</div><!--/end left column-->



      		<!-- right content column-->
      		<div class="col-md-7" id="content">
            	<div class="panel">
    			<div class="panel-heading" style="background-color:#111;color:#fff;">Новости в данной категории</div>
              	<div class="panel-body">


                    @forelse ($articles as $article)

                          <h2> <a href="{{route('article', $article->slug)}}">{{$article->title}}</a> </h2>
                          <p>{!!$article->description_short!!}</p>
                          <a class="float-right" href="{{route('article', $article->slug)}}">Читать далее</a>
                          <br>
                          <hr>

                    @empty
                      <h2 class="text-center"> Пусто</h2>

                    @endforelse
                  {{$articles->links()}}




                  <div class="well text-center">
                                    </div>

                  <hr>



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
