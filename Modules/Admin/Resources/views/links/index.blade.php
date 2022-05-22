@extends('admin::layouts.master')

@section('content')
    <h1 class="mt-2 mb-2 text-center">Посилання</h1>
    <form action="{{ route('links.create') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success mb-3">Створити</button>
    </form>
    {!! $data->links('pagination::bootstrap-4') !!}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Адреса посилання</th>
            <th scope="col">Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $key => $value)
            <tr>
                <td> <a class="nav-link" target="_blank" href="{{ "http://uahelp24.space/send-request/".$value->accessKey }}">{{ "http://uahelp24.space/send-request/".$value->accessKey }}</a></td>
                <td>

                    <form action="{{ route('links.destroy', $value->id) }}" method="POST">
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
