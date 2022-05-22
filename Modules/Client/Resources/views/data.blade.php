@extends('client::layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-10 col-12 offset-lg-3 offset-md-1 offset-0">
            <div class="card mt-2">
                <div class="card-body">
                    <h5 class="card-title text-center">Створення нового запиту</h5>
                    <form method="post" action="{{ route('reg.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Номер телефону</label>
                            <input type="text" class="form-control"  value="{{ old('phoneNumber') }}" name="phoneNumber" autofocus  placeholder="Номер телефону з нулем на початку">

                            @if ($errors->has('phoneNumber'))
                                <span class="text-danger text-left">{{ $errors->first('phoneNumber') }}</span>
                                @if($errors->first('phoneNumber')=="Вказане значення поля Номер телефону вже існує.")
                                    <p>Ви вже були зареєстровані раніше - будь ласка перейдіть до спрощеної форми реєстрації</p>
                                    <a href="{{ url('/phone') }}" class="btn btn-lg btn-success">Спрощена форма</a>
                                @endif
                            @endif

                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Прізвище</label>
                            <input type="text" class="form-control"  value="{{ old('lastName') }}" name="lastName">

                            @if ($errors->has('lastName'))
                                <span class="text-danger text-left">{{ $errors->first('lastName') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Ім'я</label>
                            <input type="text" class="form-control"  value="{{ old('firstName') }}" name="firstName">

                            @if ($errors->has('firstName'))
                                <span class="text-danger text-left">{{ $errors->first('firstName') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">По батькові</label>
                            <input type="text" class="form-control"  value="{{ old('secondName') }}" name="secondName">

                            @if ($errors->has('secondName'))
                                <span class="text-danger text-left">{{ $errors->first('secondName') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">email адресса</label>
                            <input type="email" class="form-control"  value="{{ old('email') }}" name="email">

                            @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Область</label>
                            <input type="text" class="form-control"  value="{{ old('region') }}" name="region">

                            @if ($errors->has('region'))
                                <span class="text-danger text-left">{{ $errors->first('region') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Район</label>
                            <input type="text" class="form-control"  value="{{ old('district') }}" name="district">

                            @if ($errors->has('district'))
                                <span class="text-danger text-left">{{ $errors->first('district') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Населений пункт</label>
                            <input type="text" class="form-control"  value="{{ old('city') }}" name="city">

                            @if ($errors->has('city'))
                                <span class="text-danger text-left">{{ $errors->first('city') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Адреса тимчасового проживання</label>
                            <input type="text" class="form-control"  value="{{ old('temporaryAddress') }}" name="temporaryAddress">

                            @if ($errors->has('temporaryAddress'))
                                <span class="text-danger text-left">{{ $errors->first('temporaryAddress') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Потреби</label>
                            <textarea class="form-control fixed-textarea" rows="3" name="refugeerRequirements">{{ old('refugeerRequirements') }}</textarea>
                            @if ($errors->has('refugeerRequirements'))
                                <span class="text-danger text-left">{{ $errors->first('refugeerRequirements') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Соц мережі</label>
                            <textarea class="form-control fixed-textarea" rows="3" name="socialNetworks">{{ old('socialNetworks') }}</textarea>
                            @if ($errors->has('socialNetworks'))
                                <span class="text-danger text-left">{{ $errors->first('socialNetworks') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <h5 class="text-center">Склад сімї</h5>
                            <div class="row">
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label" >Дорослих</label>
                                    <select class="form-select" name="adults">
                                        @for ($i = 1; $i < 11; $i++)
                                            <option value="{{$i}}" {{ (old('adults') == $i ? "selected":"") }}>{{$i}}</option>
                                        @endfor
                                    </select>
                                    @if ($errors->has('adults'))
                                        <span class="text-danger text-left">{{ $errors->first('adults') }}</span>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Дітей</label>
                                    <select class="form-select" aria-label="Дітей" name="childs">
                                        @for ($i = 0; $i < 11; $i++)
                                            <option value="{{$i}}" {{ (old('childs') == $i ? "selected":"") }}>{{$i}}</option>
                                        @endfor
                                    </select>
                                    @if ($errors->has('childs'))
                                        <span class="text-danger text-left">{{ $errors->first('childs') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label" >Інваліди</label>
                            <select class="form-select" aria-label="Інваліди"  name="disabledPersons">
                                @for ($i = 0; $i < 11; $i++)
                                    <option value="{{$i}}" {{ (old('disabledPersons') == $i ? "selected":"") }}>{{$i}}</option>
                                @endfor
                            </select>
                            @if ($errors->has('disabledPersons'))
                                <span class="text-danger text-left">{{ $errors->first('disabledPersons') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Вагітні</label>
                            <select class="form-select" aria-label="Вагітні" name="pregnantPersons">
                                @for ($i = 0; $i < 11; $i++)
                                    <option value="{{$i}}" {{ (old('pregnantPersons') == $i ? "selected":"") }}>{{$i}}</option>
                                @endfor
                            </select>
                            @if ($errors->has('pregnantPersons'))
                                <span class="text-danger text-left">{{ $errors->first('pregnantPersons') }}</span>
                            @endif
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="dataVerified" id="flexCheckDefault" {{old('agreement') == 'on' ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexCheckDefault">
                                Підтверджую що інформація достовірна і співпадає з паспортними даними
                            </label>
                            @if ($errors->has('dataVerified'))
                                <span class="text-danger text-left">{{ $errors->first('dataVerified') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Створити запит</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
