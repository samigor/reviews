{!! Form::open([
		'route'	=> 'admin.article.store',
		'files'	=>	true
	])!!}
<label for="">Статус</label>
<select class="form-control" name="published">
  @if (isset($article->id))
    <option value="0" @if ($article->published == 0) selected="" @endif>Не опубликовано</option>
    <option value="1" @if ($article->published == 1) selected="" @endif>Опубликовано</option>
  @else
    <option value="0">Не опубликовано</option>
    <option value="1">Опубликовано</option>
  @endif
</select>

<label for="">Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок новости" value="{{$article->title ?? ""}}" required>

<label for="">Slug (Уникальное значение)</label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация" value="{{$article->slug ?? ""}}" readonly="">

<label for="">Родительская категория</label>
<select class="form-control" name="categories[]" multiple="">

  @include('admin.articles.partials.categories', ['categories' => $categories])
</select>

<label for="Краткое описание"></label>
<textarea class="form-control" id="description_short" name="description_short" >{{$article->description_short ?? ""}}</textarea>
<label for="Полное описание"></label>
<textarea class="form-control" id="description" name="description" >{{$article->description ?? ""}}</textarea>
<label for="">Мета заголовок</label>
<input type="text" class="form-control" name="meta_title" placeholder="Мета Заголовок" value="{{$article->meta_title ?? ""}}">
<label for="">Мета описание</label>
<input type="text" class="form-control" name="meta_description" placeholder="Мета описание" value="{{$article->meta_description ?? ""}}">
<label for="">Ключевые слова</label>
<input type="text" class="form-control" name="meta_keyword" placeholder="Ключевые слова, через запятую" value="{{$article->meta_keyword ?? ""}}">
<!-- <form enctype="multipart/form-data" action="{{route('image.upload')}}" method="post">
  {{csrf_field()}}
  <div class="form-group">
    <input type="file" name="image" value="">
    <button class="btn btn-primary" type="submit">Загрузка</button>
  </div>

</form>
@isset ($path)
<img class="img-fluid" src="{{asset('/storage/' . $path)}}" alt="">
@endisset
<hr /> -->

<label>Теги</label>
{!! Form::select('tags[]',
  $tags,
  null,
  ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите теги'])
!!}

<hr />
<input class="btn btn-primary" type="submit" value="Сохранить">
{!! Form::close()!!}
