@extends('admin::layouts.master')

@section('content')
    <h3 class="text-center">Деталі запиту</h3>
    <ul class="list-group mt-3 mb-3">
        <li class="list-group-item">
            <b class="float-start">Запит</b>
            <span class="float-end"> {{$requestData->refugeerRequirements}}</span>
        <li class="list-group-item">
            <b class="float-start">Статус</b>
            <span class="float-end">
               @switch($requestData->status)
                    @case(0)
                    <span class="badge rounded-pill bg-warning" style="font-size: 20px">Запит відправлено</span>
                    @break
                    @case(1)
                    <span class="badge rounded-pill bg-success" style="font-size: 20px">Запит прийнято</span>
                    @break
                    @case(2)
                    <span class="badge rounded-pill bg-info" style="font-size: 20px">Точка видачі обрана</span>
                    @break
                    @case(3)
                    <span class="badge rounded-pill bg-dark" style="font-size: 20px">Видано</span>
                    @break
                    @case(4)
                    <span class="badge rounded-pill bg-danger" style="font-size: 20px">Запит відхилено</span>
                    @break
               @endswitch
            </span>
        </li>
        <li class="list-group-item">
            <b class="float-start">Дата видачі</b>
            <span class="float-end"> {{ $requestData->issueDate ? date("Y-m-d", $requestData->issueDate) : "Не видано"}}</span>
        </li>
        <li class="list-group-item">
            <b class="float-start">Місце видачи</b>
            <span class="float-end"> {{$requestData->givingPointId ? $requestData->point->pointName." - ".$requestData->point->pointAdress : "Не задано"}}</span>
        </li>
    </ul>
    <h3 class="text-center">Дії</h3>
    <div class="row">
        <div class="col-12 text-center">
            @switch($requestData->status)
                @case(0)
                    <a href="{{ route('people-requests.accept', $requestData->id) }}" class="btn btn-success" >Прийняти</a>
                    <a href="{{ route('people-requests.decline', $requestData->id) }}" class="btn btn-danger" >Відхилити</a>
                @break
                @case(1)

                <label for="exampleFormControlInput1" class="form-label">Оберіть точку видачі</label>
                <form method="post" action="{{ route('people-requests.update', $requestData->id) }}">
                    @csrf
                    @method("PUT")
                    <select class="form-select" aria-label="Точка видачі" name="givingPointId">
                            <option value="0" {{ (old('givingPointId') == "0" ? "selected":"") }}>Не обрано</option>
                        @foreach ( $requestData->categories as $point)
                            <option value="{{$point->id}}" {{ (old('childs') == $point->id ? "selected":"") }}>{{$point->pointName}} - {{$point->pointAdress}}</option>
                        @endforeach
                    </select>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary mt-4">Обрати</button>
                    </div>
                </form>
                @break
                @case(2)
                <div class="mb-3 text-center">
                    <a href="{{ route('people-requests.given', $requestData->id) }}" class="btn btn-lg btn-success">Видано</a>
                </div>
                @break
                @case(3)
                    <span class="badge rounded-pill bg-dark" style="font-size: 20px">Видано</span>
                @break
                @case(4)
                    <span class="badge rounded-pill bg-danger" style="font-size: 20px">Запит відхилено</span>
                @break
            @endswitch
        </div>
    </div>
    <h3 class="text-center">Дані про людину</h3>
    <ul class="list-group">
        <li class="list-group-item">
            <b class="float-start">Номер телефону</b>
            <span class="float-end">{{$requestData->human->phoneNumber}}</span>
        </li>
        <li class="list-group-item">
            <b class="float-start">Ім'я</b>
            <span class="float-end">{{$requestData->human->lastName}} {{$requestData->human->firstName}} {{$requestData->human->secondName}}</span>
        </li>
        <li class="list-group-item">
            <b class="float-start">Электронна пошта</b>
            <span class="float-end">{{$requestData->human->email}}</span>
        </li>
        <li class="list-group-item">
            <b class="float-start">Адреса</b>
            <span class="float-end">{{$requestData->human->region}}, {{$requestData->human->district}}, {{$requestData->human->city}}</span>
        </li>

        <li class="list-group-item">
            <b class="float-start">Тимчасова адреса</b>
            <span class="float-end">{{$requestData->human->temporaryAddress}}</span>
        </li>

        <li class="list-group-item">
            <b class="float-start">Сімейний стан</b>
            <span class="float-end">Дорослих: {{$requestData->human->adults}}, Дітей: {{$requestData->human->childs}}, Інвалідів: {{$requestData->human->disabledPersons}}, Вагітних: {{$requestData->human->pregnantPersons}}</span>
        </li>

        <li class="list-group-item">
            <b class="float-start">Соціальні мережі</b>
            <span class="float-end"> {{$requestData->human->socialNetworks}}</span>
        </li>
        <li class="list-group-item">
            <b class="float-start">Спеціальні відмітки</b>
            <span class="float-end"> {{$requestData->human->specialMarks}}</span>
        </li>
    </ul>
    <h3 class="text-center">Дані про родину</h3>
    <div class="row">
        @foreach ($requestData->human->relatives as $relative)
            <div class="col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$relative->refugee->lastName}} {{$relative->refugee->firstName}} {{$relative->refugee->secondName}}</h5>

                        <ul class="list-group">
                            <li class="list-group-item">
                                <b class="float-start">Номер телефону</b>
                                <span class="float-end">{{$relative->refugee->phoneNumber}}</span>
                            </li>
                            <li class="list-group-item">
                                <b class="float-start">Электронна пошта</b>
                                <span class="float-end">{{$relative->refugee->email}}</span>
                            </li>
                            <li class="list-group-item">
                                <b class="float-start">Адреса</b>
                                <span class="float-end">{{$relative->refugee->region}}, {{$relative->refugee->district}}, {{$relative->refugee->city}}</span>
                            </li>

                            <li class="list-group-item">
                                <b class="float-start">Тимчасова адреса</b>
                                <span class="float-end">{{$relative->refugee->temporaryAddress}}</span>
                            </li>

                            <li class="list-group-item">
                                <b class="float-start">Сімейний стан</b>
                                <span class="float-end">Дорослих: {{$relative->refugee->adults}}, Дітей: {{$relative->refugee->childs}}, Інвалідів: {{$relative->refugee->disabledPersons}}, Вагітних: {{$relative->refugee->pregnantPersons}}</span>
                            </li>

                            <li class="list-group-item">
                                <b class="float-start">Соціальні мережі</b>
                                <span class="float-end"> {{$relative->refugee->socialNetworks}}</span>
                            </li>
                            <li class="list-group-item">
                                <b class="float-start">Спеціальні відмітки</b>
                                <span class="float-end"> {{$relative->refugee->specialMarks}}</span>
                            </li>
                            <li class="list-group-item">
                                <b class="float-start">Співпали по прізвищу</b>
                                <span class="float-end"> {{$relative['lastNameCoincidence'] ? 'Так' : 'Ні'}}</span>
                            </li>
                            <li class="list-group-item">
                                <b class="float-start">Співпали по прізвищу та місту</b>
                                <span class="float-end"> {{$relative['lastNameAndCityCoincidence'] ? 'Так' : 'Ні'}}</span>
                            </li>
                            <li class="list-group-item">
                                <b class="float-start">Співпали по прізвищу та складу сімї</b>
                                <span class="float-end"> {{$relative['lastNameAndFamilyCoincidence'] ? 'Так' : 'Ні'}}</span>
                            </li>
                            <li class="list-group-item">
                                <b class="float-start">Співпали по складу сімї та місту</b>
                                <span class="float-end"> {{$relative['FamilyAndCityCoincidence'] ? 'Так' : 'Ні'}}</span>
                            </li>
                            <li class="list-group-item">
                                <b class="float-start">Гуманітарну допомогу було отримано</b>
                                <span class="float-end">
                                                @foreach($relative->refugee->helpRequests as $request)
                                        @if($request->status==3)
                                            <br>{{date("Y-m-d", $request->issueDate)}} ({{round((time()-$request->issueDate) / (60 * 60 * 24))}} днів тому)
                                        @endif
                                    @endforeach
                                            </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
