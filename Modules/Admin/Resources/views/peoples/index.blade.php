@extends('admin::layouts.master')

@section('content')
    <h1 class="mt-2 mb-2 text-center">Люди</h1>

    {!! $data->links('pagination::bootstrap-4') !!}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Ім'я</th>
            <th scope="col">Прізвище</th>
            <th scope="col">Номер телефону</th>
            <th scope="col">Населений пункт</th>
            <th scope="col">Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $key => $value)
            <tr>
                <td>{{ $value->firstName }}</td>
                <td>{{ $value->lastName }}</td>
                <td>{{ $value->phoneNumber }}</td>
                <td>{{ $value->city }}</td>
                <td>

                    <form action="{{ route('peoples.destroy',$value->id) }}" method="POST">
                        <a href="{{ route('peoples.show', $value->id) }}" target="_blank"  class="btn btn-success" >Переглянути</a>
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
