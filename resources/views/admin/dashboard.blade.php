@extends ('admin.layouts.app_admin')
@section ('content')
<div class="container">
  <div class="row">
    <div class="col-sm-3">
        <div class="jumbotron">
      <button type="button" class="btn btn-primary">
  Категорий <span class="badge badge-light">{{$count_categories}}</span>
</button>
  </div>
    </div>
    <div class="col-sm-3">
      <div class="jumbotron">
      <button type="button" class="btn btn-primary">
  Статей <span class="badge badge-light">{{$count_articles}}</span>
</button>
</div>
    </div>
    <div class="col-sm-3">
        <div class="jumbotron">
      <button type="button" class="btn btn-primary">

  Комментариев <span class="badge badge-light">{{$count_comments}}</span>
</button>
  </div>
    </div>
    <div class="col-sm-3">
        <div class="jumbotron">
      <button type="button" class="btn btn-primary">
  Пользователей <span class="badge badge-light">{{$count_users}}</span>
</button>
  </div>
    </div>
    <div class="col-sm-6">
      <div class="alert alert-primary" role="alert">
      <a class="list-group-item list-group-item-action" href="{{route('admin.category.create')}}">Создать категорию</a>
      </div>
      @foreach ($categories as $category)
      <a class="list-group-item" href="{{route('admin.category.edit', $category)}}">
      <h4 class="d-flex w-100 justify-content-between">{{$category->title}}</h4>
      <p class="d-flex w-100 justify-content-between">{{$category->articles()->count()}}</p></a>
      @endforeach
    </div>
    <div class="col-sm-6">
        <div class="alert alert-primary" role="alert">
      <a class="list-group-item list-group-item-action" href="{{route('admin.article.create')}}">Создать материал</a>
        </div>
          @foreach ($articles as $article)
      <a class="list-group-item" href="{{route('admin.article.edit', $article)}}">
      <h4 class="d-flex w-100 justify-content-between">{{$article->title}}</h4>
      <p class="d-flex w-100 justify-content-between">{{$article->categories()->pluck('title')->implode(', ')}}</p></a>
        @endforeach
    </div>
  </div>
</div>
@endsection
