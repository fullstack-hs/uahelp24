@extends('admin::layouts.master')

@section('content')
    <h1 class="mt-2 mb-2 text-center">Запити</h1>

    <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
            <a class="nav-link {{ request()->status==0 ? 'active' : '' }}" aria-current="page" href="/admin/people-requests/0">Очікують перевірку</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->status==1 ? 'active' : '' }}" href="/admin/people-requests/1">Прийняті</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->status==2 ? 'active' : '' }}" href="/admin/people-requests/2"> Точка видачі обрана</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->status==3 ? 'active' : '' }}" href="/admin/people-requests/3" tabindex="-1">Видано</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->status==4 ? 'active' : '' }}" href="/admin/people-requests/4">Відхилено</a>
        </li>
    </ul>

    @if(request()->status==2 || request()->status==3)
        <form method="get" action="{{ route('people-requests.search', request()->status) }}">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label mt-5">Оберіть точку видачі</label>
                <select class="form-select" aria-label="Оберіть точку видачі" name="givingPointId">
                    @foreach ($points as $point)
                        <option value="{{$point->id}}" {{request()->input("givingPointId") == $point->id ? "selected" : ""}}>{{$point->pointName}} - {{$point->pointAdress}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Прізвище чи номер телефону</label>
                <input type="text" class="form-control"  value="{{ request()->input("phoneNumberOrName") }}" name="phoneNumberOrName"  placeholder="Номер телефону з нулем на початку або прізвище">

                @if ($errors->has('phoneNumberOrName'))
                    <span class="text-danger text-left">{{ $errors->first('phoneNumberOrName') }}</span>
                @endif

            </div>
            <div class="mb-5 text-center">
                <button type="submit" class="btn btn-primary mt-3">Знайти</button>
            </div>
        </form>
    @endif

    {!! $data->appends(request()->query())->links('pagination::bootstrap-4') !!}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Автор запиту</th>
            <th scope="col">Номер телефону</th>
            <th scope="col">Область</th>
            <th scope="col">Район</th>
            <th scope="col">Місто</th>
            <th scope="col">Потреби</th>
            <th scope="col">Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $key => $value)
            <tr>
                <td>{{ $value->human->lastName }} {{ $value->human->firstName }} {{ $value->human->secondName }}</td>
                <td>{{ $value->human->phoneNumber }}</td>
                <td>{{ $value->human->region }}</td>
                <td>{{ $value->human->district }}</td>
                <td>{{ $value->human->city }}</td>
                <td>{{ $value->refugeerRequirements }}</td>
                <td>
                        <a href="{{ route('people-requests.show', $value->id) }}"  class="btn btn-primary" >Переглянути</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="col-6 offset-3">

        {!! $data->appends(request()->query())->links('pagination::bootstrap-4') !!}
    </div>
@endsection
