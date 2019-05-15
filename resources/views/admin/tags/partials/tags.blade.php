@foreach($tags as $tag_list)
    <option value="{{$tag_list->id ?? ""}}"
            @isset($tags->id)
            @if ($tags->parent_id == $tag_list->id)
            selected=""
            @endif
            @if($tags->id==$tag_list->id)
            hidden=""
            @endif
            @endisset
    
        {!! $delimiter ?? "" !!}{{$tag_list->title ?? ""}}
    </option>
    @endforeach
