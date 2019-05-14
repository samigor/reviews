@extends('layouts.app')

@section('content')
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
                                    Тег 1
                                    Тег 2
                                    Тег 3
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
    			<div class="panel-heading" style="background-color:#111;color:#fff;">Обратная связь</div>
              	<div class="panel-body">

                  <div class="row">
                    <div class="container">
                    <div class="post-content">
                                                <header class="entry-header text-center text-uppercase">

                                                    <br>
                                                      <h6 class="text-uppercase">Обратная связь</h6>
                                                    <br>
                                                    <form class="form-horizontal contact-form" role="form" method="post" action="/mail">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" id="name" name="name"
                                                                       placeholder="Ваше имя">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" id="email" name="email"
                                                                       placeholder="E-mail">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" id="phone" name="phone"
                                                                       placeholder="Телефон (xxx)xxx-xx-xx">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">

                    										<textarea class="form-control" rows="6" id="msg" name="msg"
                                                                      placeholder="Текст сообщения"></textarea>
                                                            </div>
                                                        </div>
                                                        {{csrf_field()}}
                                                        <button type="submit" name="submit" class="btn send-btn">Отправить</button>

                                                    </form>

                                                </header>
                                                <div class="entry-content">


                                                    <div class="btn-continue-reading text-center text-uppercase">

                                                    </div>
                                                </div>
                                                <div class="social-share">


                                                </div>
                                            </div>
                                        </article>
                                    </div>
                    </div>
                </div>



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
