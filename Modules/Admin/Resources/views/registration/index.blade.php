@extends('admin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            <h1 class="text-center">Реєстрація</h1>
            <div class="row">
                <div class="mt-2 col-6 text-center">
                    <a href="{{ url('/admin/registration/by-phone') }}" class="btn btn-lg btn-success">Раніше зареєстровані</a>
                </div>
                <div class="mt-2 col-6 text-center">
                    <a href="{{ url('/admin/registration/by-data') }}" class="btn btn-lg btn-success">Нова реєстрація</a>
                </div>
            </div>
        </div>
    </div>
@endsection
