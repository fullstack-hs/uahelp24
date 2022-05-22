@extends('admin::layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-center">Інформація про людину</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <ul class="list-group">
                <li class="list-group-item">
                    <b class="float-start">Номер телефону</b>
                    <span class="float-end">{{$people->phoneNumber}}</span>
                </li>
                <li class="list-group-item">
                    <b class="float-start">Ім'я</b>
                    <span class="float-end">{{$people->lastName}} {{$people->firstName}} {{$people->secondName}}</span>
                </li>
                <li class="list-group-item">
                    <b class="float-start">Электронна пошта</b>
                    <span class="float-end">{{$people->email}}</span>
                </li>
                <li class="list-group-item">
                    <b class="float-start">Адреса</b>
                    <span class="float-end">{{$people->region}}, {{$people->district}}, {{$people->city}}</span>
                </li>

                <li class="list-group-item">
                    <b class="float-start">Тимчасова адреса</b>
                    <span class="float-end">{{$people->temporaryAddress}}</span>
                </li>

                <li class="list-group-item">
                    <b class="float-start">Сімейний стан</b>
                    <span class="float-end">Дорослих: {{$people->adults}}, Дітей: {{$people->childs}}, Інвалідів: {{$people->disabledPersons}}, Вагітних: {{$people->pregnantPersons}}</span>
                </li>

                <li class="list-group-item">
                    <b class="float-start">Соціальні мережі</b>
                    <span class="float-end"> {{$people->socialNetworks}}</span>
                </li>
                <li class="list-group-item">
                    <b class="float-start">Спеціальні відмітки</b>
                    <span class="float-end"> {{$people->specialMarks}}</span>
                </li>
            </ul>
            <h3 class="text-center mt-2 mb-2">Можливі родичі</h3>
            <div class="row">
            @foreach ($people->relatives as $relative)
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
            <h3 class="text-center mt-2 mb-2">Запити гуманітарної допомоги</h3>

            @foreach ($people->helpRequests as $helpRequest)
                <ul class="list-group mt-3 mb-3">
                    <li class="list-group-item">
                        <b class="float-start">Запит</b>
                        <span class="float-end"> {{$helpRequest->refugeerRequirements}}</span>
                    <li class="list-group-item">
                        <b class="float-start">Статус</b>
                        <span class="float-end">
                        @switch($helpRequest->status)
                                @case(0)
                                Запит відправлено
                                @break
                                @case(1)
                                Запит прийнято
                                @break
                                @case(2)
                                Точка видачі обрана
                                @break
                                @case(3)
                                Видано
                                @break
                                @case(4)
                                Запит відхилено
                                @break
                            @endswitch

                    </span>
                    </li>
                    <li class="list-group-item">
                        <b class="float-start">Дата видачі</b>
                        <span class="float-end"> {{ $helpRequest->issueDate ? date("Y-m-d", $helpRequest->issueDate) : "Не видано"}}</span>
                    </li>
                    <li class="list-group-item">
                        <b class="float-start">Місце видачи</b>
                        <span class="float-end"> {{$helpRequest->givingPointId ? $helpRequest->givingPointId : "Не задано"}}</span>
                    </li>
                </ul>
            @endforeach
            <h3 class="text-center mt-2 mb-2">Спеціальні відмітки</h3>

            <form method="post" action="{{ route('peoples.update', $people->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Спеціальні відмітки</label>
                    <textarea class="form-control fixed-textarea" rows="3" name="specialMarks">{{ $people->specialMarks }}</textarea>
                    @if ($errors->has('specialMarks'))
                        <span class="text-danger text-left">{{ $errors->first('specialMarks') }}</span>
                    @endif
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Зберегти</button>
                </div>
            </form>
        </div>
    </div>

@endsection
