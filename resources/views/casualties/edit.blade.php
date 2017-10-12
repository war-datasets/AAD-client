@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message') {{-- Flash message instance --}}

        <div class="row">
            <div class="col-md-12">

                <form action="">
                    <div class="panel panel-default"> {{-- Start edit form --}}
                        <div class="panel-heading">
                            <span class="heading-title">
                                <code>{{ $casualty->service_no }}</code> {{ $casualty->member_name }}

                                <span class="pull-right">
                                    {{ $casualty->oi_name }}
                                </span>
                            </span>
                        </div>

                        <ul class="list-group">
                            <li class="list-group-item"> {{-- General information --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>General:</h4>
                                        <span class="help-block">
                                            General information about the casualty. <br>
                                            This excludes death dataand military records.
                                        </span>
                                    </div>

                                    <div class="col-md-4" style="margin-bottom: 8px;">
                                        <label for="">Name:</label>
                                        <input class="form-control" type="text" value="{{ $casualty->member_name }}">
                                    </div>

                                    <div class="col-md-4" style="margin-bottom: 8px;">
                                        <label for="">Marital status:</label>
                                        <input type="text" class="form-control" value="{{ $casualty->marital_status }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Birth date:</label>
                                        <input class="form-control" type="text" value="{{ date('Y/m/d', strtotime($casualty->birth_date)) }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Death date:</label>
                                        <input class="form-control" type="date" value="{{ date('Y/m/d', strtotime($casualty->death_dt)) }}">
                                    </div>
                                </div>
                            </li> {{-- /General information --}}

                            <li class="list-group-item"> {{-- Military service data --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>Service data:</h4>
                                        <span class="help-block">
                                            Data about their military service.
                                        </span>
                                    </div>
                                </div>
                            </li> {{-- /Military service data --}}

                            <li class="list-group-item"> {{-- casualty data --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>Casualty information:</h4>
                                        <span class="help-block">Data about the casualty circumstances.</span>
                                    </div>
                                </div>
                            </li> {{-- /Casualty data --}}
                        </ul>

                        <div class="panel-footer text-right">
                            <button type="reset" class="btn btn-xs btn-link">
                                <span class="fa fa-undo" aria-hidden="true"></span> Undo
                            </button>

                            <button class="btn btn-success btn-xs" type="submit" form="casualty">
                                <span class="fa fa-check" aria-hidden="true">Save changes</span>
                            </button>
                        </div>
                    </div> {{-- End edit form --}}
                </form>

            </div>
        </div>
    </div>
@endsection