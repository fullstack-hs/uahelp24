@extends('admin::layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Інформація про точку видачи</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('giving-points.index') }}"> Повернутися </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Назва:</strong>
                {{ $user->pointName }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Адресса:</strong>
                {{ $user->pointAdress }}
            </div>
        </div>
    </div>
@endsection
