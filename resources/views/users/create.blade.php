@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message') {{-- Flash message instance. --}}

        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="fa fa-fw fa-user-plus" aria-hidden="true"></span> Register new user.
                    </div>

                    <div class="panel-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection