@extends('admin.layouts.app_admin')
@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Редактирование тега @endslot
            @slot('parent') Главная @endslot
            @slot('active') Тег @endslot
        @endcomponent
        <hr/>
        <form class="form-horizontal" action="{{route('admin.tags.update',$tag)}}" method="post">
            <input type="hidden" name="_method" value="put">

            {{csrf_field()}}
            {{--form include--}}
            @include('admin.tags.partials.form')
        </form>
    </div>
@endsection
