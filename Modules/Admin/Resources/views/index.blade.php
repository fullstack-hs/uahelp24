@extends('admin::layouts.master')

@section('content')
    <h1 class="mt-2 mb-2 text-center">Люди</h1>

    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Пошук">
            </div>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-primary">Знайти</button>
        </div>
    </div>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Прізвище</th>
            <th scope="col">Ім'я</th>
            <th scope="col">По батькові</th>
            <th scope="col">Номер телефону</th>
            <th scope="col">Дії</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Тест</td>
            <td>Тест</td>
            <td>Тест</td>
            <td>Тест</td>
            <td>
                <button type="button" class="btn btn-primary">Детальніше</button>
            </td>
        </tr>

        </tbody>
    </table>
@endsection
