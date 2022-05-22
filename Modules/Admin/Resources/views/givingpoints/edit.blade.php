@extends('admin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <h5 class="card-title text-center">Змінити дані адміністратора</h5>
            <form method="POST" action="{{ route('giving-points.update', $givingPoint->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Назва</label>
                    <input type="text" class="form-control"  value="{{ $givingPoint->pointName }}" name="pointName" autofocus  placeholder="Назва">

                    @if ($errors->has('pointName'))
                        <span class="text-danger text-left">{{ $errors->first('pointName') }}</span>
                    @endif
                </div>


                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Адресса</label>
                    <input type="text" class="form-control" name="pointAdress"  value="{{ $givingPoint->pointAdress  }}"  placeholder="Адресса">

                    @if ($errors->has('pointAdress'))
                        <span class="text-danger text-left">{{ $errors->first('pointAdress') }}</span>
                    @endif
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Зберегти зміни</button>
                </div>
            </form>
        </div>
    </div>
@endsection
