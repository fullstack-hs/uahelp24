@extends('admin::layouts.master')

@section('content')
    <h1 class="mt-2 mb-2 text-center">Адміністратори</h1>
    <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Створити</a>
    {!! $data->links('pagination::bootstrap-4') !!}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Прізвище та Ім'я</th>
            <th scope="col">Електронна пошта</th>
            <th scope="col">Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $key => $value)
            <tr>
                <td>{{ $value->fnamesname }}</td>
                <td>{{ $value->email }}</td>
                <td>

                    <form action="{{ route('users.destroy',$value->id) }}" method="POST">
                        <a href="{{ route('users.edit', $value->id) }}"  class="btn btn-primary" >Редагувати</a>
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
