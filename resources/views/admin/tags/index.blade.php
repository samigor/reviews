@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Список тегов @endslot
            @slot('parent') Главная @endslot
            @slot('active') Теги @endslot
        @endcomponent
        <hr>
        <a href="{{route('admin.tags.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o">
                Создать тег
            </i> </a>
        <table class="table table-striped">
            <thead>
            <th>id</th>
            <th>Название</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse($tags as $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->title}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){return true}else{return false}"
                              action="{{route('admin.tags.destroy', $tag)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <a class="btn btn-default" href="{{route('admin.tags.edit',$tag)}}">
                                <i class="fa fa-edit"></i> </a>
                            <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Пусто</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">

                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection
