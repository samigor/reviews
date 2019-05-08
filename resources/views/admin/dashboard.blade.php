@extends ('admin.layouts.app_admin')
@section ('content')
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <div class="jumbotron">
        <p><span class="list-group-item d-flex justify-content-between align-items-center">Категорий {{$count_categories}}</span></p>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="jumbotron ">
        <p><span class="list-group-item d-flex justify-content-between align-items-center">Статей {{$count_articles}}</span></p>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="jumbotron">
        <p><span class="list-group-item d-flex justify-content-between align-items-center">Посетителей 0</span></p>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="jumbotron">
        <p><span class="list-group-item d-flex justify-content-between align-items-center">Сегодня 0</span></p>
      </div>
    </div>
    <div class="col-sm-6">
      <a class="list-group-item list-group-item-action" href="{{route('admin.category.create')}}">Создать категорию</a>
      @foreach ($categories as $category)
      <a class="list-group-item" href="{{route('admin.category.edit', $category)}}">
      <h4 class="d-flex w-100 justify-content-between">{{$category->title}}</h4>
      <p class="d-flex w-100 justify-content-between">{{$category->articles()->count()}}</p></a>
      @endforeach
    </div>
    <div class="col-sm-6">
      <a class="list-group-item list-group-item-action" href="{{route('admin.article.create')}}">Создать материал</a>
          @foreach ($articles as $article)
      <a class="list-group-item" href="{{route('admin.article.edit', $article)}}">
      <h4 class="d-flex w-100 justify-content-between">{{$article->title}}</h4>
      <p class="d-flex w-100 justify-content-between">{{$article->categories()->pluck('title')->implode(', ')}}</p></a>
        @endforeach
    </div>
  </div>
</div>
@endsection
