@extends('admin::layouts.master')

@section('content')
    <h1 class="mt-2 mb-2 text-center">Точки видачі</h1>
    <a href="{{ route('giving-points.create') }}" class="btn btn-success mb-3">Створити</a>
    {!! $data->links('pagination::bootstrap-4') !!}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Назва</th>
            <th scope="col">Адресса</th>
            <th scope="col">Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $key => $value)
            <tr>
                <td>{{ $value->pointName }}</td>
                <td>{{ $value->pointAdress }}</td>
                <td>

                    <form action="{{ route('giving-points.destroy',$value->id) }}" method="POST">
                        <a href="{{ route('giving-points.edit', $value->id) }}"  class="btn btn-primary" >Редагувати</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Видалити</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="col-6 offset-3">
        {!! $data->links('pagination::bootstrap-4') !!}
    </div>
@endsection
