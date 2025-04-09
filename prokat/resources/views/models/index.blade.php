@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Комментарий</th>
                <th scope="col">Название</th>
                <th scope="col">Тип</th>
                <th scope="col">Первое фото</th>
{{--                <th scope="col">Второе фото</th>--}}
{{--                <th scope="col">Третье фото</th>--}}
{{--                <th scope="col">Первое видео</th>--}}
{{--                <th scope="col">Второе видео</th>--}}
{{--                <th scope="col">Третье видео</th>--}}
                <th scope="col">Первое описание</th>
{{--                <th scope="col">Второе описание</th>--}}
{{--                <th scope="col">Третье описание</th>--}}
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($models as $model)
                <tr>
                    <td>{{ $model->comment }}</td>
                    <td>{{ $model->name }}</td>
                    <td>{{ $model->type }}</td>
                    <td>
                        <img class="img-fluid" style="max-width: 100px" src="{{$model->photo1Url()}}" alt=""/>
                    </td>
{{--                    <td>--}}
{{--                        <img class="img-fluid" style="max-width: 100px" src="{{$model->photo2Url()}}" alt=""/>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <img class="img-fluid" style="max-width: 100px" src="{{$model->photo3Url()}}" alt=""/>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                    <td>--}}
{{--                        <video controls class="img-fluid" style="max-width: 100px" src="{{$model->video1Url()}}"></video>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <video controls class="img-fluid" style="max-width: 100px" src="{{$model->video2Url()}}"></video>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <video controls class="img-fluid" style="max-width: 100px" src="{{$model->video3Url()}}"></video>--}}
{{--                    </td>--}}
                    <td>{{ $model->description1 }}</td>
{{--                    <td>{{ $model->description2 }}</td>--}}
{{--                    <td>{{ $model->description3 }}</td>--}}
                    <td>
                        <div class="d-flex gap-1">
                            <a class="btn btn-primary" href="{{ route('models.edit', ['model' => $model]) }}"><i class="bi bi-pencil"></i></a>
                            <form action="{{route('models.destroy', ['model' => $model])}}" method="post">
                                <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                @method('DELETE')
                            </form>
                            <a class="btn btn-secondary"
                               href="{{ route('models.pricelists', ['model' => $model]) }}">
                                Прайслисты
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route('models.create') }}">Создать</a>
    </div>
@endsection
