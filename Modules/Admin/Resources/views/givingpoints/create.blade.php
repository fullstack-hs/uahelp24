@extends('admin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <h5 class="card-title text-center">Додати адміністратора</h5>
            <form method="post" action="{{ route('giving-points.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Назва</label>
                    <input type="text" class="form-control"  value="{{ old('pointName') }}" name="pointName" autofocus  placeholder="Назва">

                    @if ($errors->has('pointName'))
                        <span class="text-danger text-left">{{ $errors->first('pointName') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Адреса</label>
                    <input type="text" class="form-control"  value="{{ old('pointAdress') }}" name="pointAdress" autofocus  placeholder="Адресса">

                    @if ($errors->has('pointAdress'))
                        <span class="text-danger text-left">{{ $errors->first('pointAdress') }}</span>
                    @endif
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Додати</button>
                </div>
            </form>
        </div>
    </div>
@endsection
