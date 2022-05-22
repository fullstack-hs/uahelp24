@extends('admin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card mt-2">
                <div class="card-body">
                    <h5 class="card-title text-center">Форма реєстрації (Кропивницький)</h5>

                    <form method="post" action="{{ route('registration.storeByPhone') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Номер телефону</label>
                            <input type="text" class="form-control"  value="{{ old('phoneNumber') }}" name="phoneNumber" autofocus  placeholder="Номер телефону з нулем на початку">
                            @if ($errors->has('phoneNumber'))
                                <span class="text-danger text-left">{{ $errors->first('phoneNumber') }}</span>
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
                            <label for="exampleFormControlInput1" class="form-label">Дата видачі допомоги</label>
                            <input type="text"  class="form-control datepicker"  value="{{ old('issueDate') }}" name="issueDate" autofocus  placeholder="Оберіть дату">

                            @if ($errors->has('issueDate'))
                                <span class="text-danger text-left">{{ $errors->first('issueDate') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Статус</label>
                            <select class="form-select" aria-label="Вагітні" name="status">
                                <option value="0">Очікують перевірку</option>
                                <option value="1">Прийнято в обробку</option>
                                <option value="3">Видано</option>
                                <option value="4">Відхилено</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="text-danger text-left">{{ $errors->first('status') }}</span>
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
        <script>
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                language: 'uk-UA'
            });
        </script>
    </div>
@endsection
