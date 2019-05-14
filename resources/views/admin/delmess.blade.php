@if(Auth::check() && Auth::user())
    <form onsubmit="if(confirm('Удалить?')){return true}else{return false}"
          action="{{route('comments.destroy', $comment->id)}}" method="post">
        <input type="hidden" name="_method" value="DELETE">
        {{csrf_field()}}
        <button type="submit" class="btn"><i class="fa fa-trash-o fa-lg"></i>Удалить</button>
    </form>
@endif
