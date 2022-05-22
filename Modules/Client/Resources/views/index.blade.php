@extends('client::layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-10 col-12 offset-lg-3 offset-md-1 offset-0">
            <h1 class="text-center">Реєстрація</h1>
            <div class="row">
                <div class="mt-2 col-lg-6 col-md-6 col-12 text-center">
                    <a href="{{ url('/phone') }}" class="btn btn-lg btn-success">Раніше зареєстровані</a>
                </div>
                <div class="mt-2 col-lg-6 col-md-6 col-12 text-center">
                    <a href="{{ url('/data') }}" class="btn btn-lg btn-success">Нова реєстрація</a>
                </div>
            </div>
        </div>
    </div>
@endsection
