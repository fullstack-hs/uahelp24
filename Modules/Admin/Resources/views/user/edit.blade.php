@extends('admin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <h5 class="card-title text-center">Змінити дані адміністратора</h5>
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Прізвище та Ім'я</label>
                    <input type="text" class="form-control"  value="{{ $user->fnamesname }}" name="fnamesname" autofocus  placeholder="Зеленьский Володимир">

                    @if ($errors->has('fnamesname'))
                        <span class="text-danger text-left">{{ $errors->first('fnamesname') }}</span>
                    @endif
                </div>


                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Електронна пошта</label>
                    <input type="email" class="form-control" name="email"  value="{{ $user->email  }}"  placeholder="letter@apu.gov.ua">

                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Пароль</label>
                    <input type="password" class="form-control" name="password" value="" >

                    @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Пароль повторно</label>
                    <input type="password" name="password_confirmation" value="" class="form-control" >

                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" {{  $user->isAdmin ? 'checked="checked"' : '' }} name="isAdmin">
                    <label class="form-check-label" for="flexCheckDefault">
                        Надати розширені права
                    </label>
                    @if ($errors->has('isAdmin'))
                        <span class="text-danger text-left">{{ $errors->first('isAdmin') }}</span>
                    @endif
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Зберегти зміни</button>
                </div>
            </form>
        </div>
    </div>
@endsection
