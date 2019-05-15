
<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Тег"
       value="{{$tag->title ?? ""}}" required>

<label for="">Slug</label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация"
       value="{{$tag->slug ?? ""}}" readonly="">
<hr />
<input class="btn btn-primary" type="submit" value="Сохранить">
