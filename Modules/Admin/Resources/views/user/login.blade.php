@extends('admin::layouts.master')


@section('content')
    <div class="row">
        <div class="col-6 offset-3">
                    <h5 class="card-title text-center">Виконти вхід</h5>
            <form method="post" action="{{ route('auth.login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Електронна пошта</label>
                        <input type="email" class="form-control" name="email"  value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Пароль</label>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" >

                        @if ($errors->has('password'))
                            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Вхід</button>
                    </div>
            </form>
        </div>
    </div>
@endsection
