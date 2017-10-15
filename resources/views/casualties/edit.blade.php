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
                                    <div class="col-md-4" style="margin-bottom: 8px;">
                                        <label for="">Service number:</label>
                                        <input type="text" class="form-control" value="{{ $casualty->service_no }}">
                                    </div>
                                    <div class="col-md-4" style="margin-bottom: 8px;">
                                        <label>Service:</label>

                                        <select name="" id="" class="form-control">
                                            <option value="">-- Select the service type --</option>

                                            @foreach ($services as $service)
                                                <option value="{{ $service->code }}" @if (strtoupper($casualty->s) == strtoupper($service->code)) selected @endif>
                                                    {{ $service->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4" style="margin-bottom: 8px;">
                                        <label for="">Paygrade:</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">-- Select the military paygrade --</option>

                                            @foreach($payGrades as $paygrade)
                                                <option value="{{ $paygrade->id }}" @if (strtoupper($casualty->pg) === strtoupper($paygrade->code)) selected @endif>
                                                    {{ $paygrade->code }} - ({{ $paygrade->group_name }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4" style="margin-bottom: 8px;">
                                        <label>Rank/Rate:</label>
                                        <input value="{{ $casualty->rank_rate }}" class="form-control" type="text">
                                    </div>
                                    <div class="col-md-offset-4 col-md-4" style="margin-bottom: 8px;">
                                        <label>Unit name:</label>
                                        <input value="{{ $casualty->unit_name }}" class="form-control" type="text">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Occupation:</label>
                                        <input value="{{ $casualty->occupation_name }}" class="form-control" type="text">
                                    </div>
                                </div>
                            </li> {{-- /Military service data --}}

                            <li class="list-group-item"> {{-- Operation name --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>Operation data:</h4>
                                        <span class="help-block">Information about the military warzone or operation.</span>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Type code:</label>
                                        <input type="text" class="form-control" value="{{ $casualty->oitp }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Name:</label>
                                        <input type="text" class="form-control" value="{{ $casualty->oi_name }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Location:</label>
                                        <inpyt type="text" class="form-control" value="{{ $casualty->oi_location }}">
                                    </div>
                                </div>
                            </li> {{-- /Operation data --}}

                            <li class="list-group-item"> {{-- casualty data --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>Casualty information:</h4>
                                        <span class="help-block">Data about the casualty circumstances.</span>
                                    </div>

                                    <div class="col-md-4" style="margin-bottom: 8px;">
                                        <label>Circumstamces:</label>
                                        <input value="{{ $casualty->cas_circumstances }}" class="form-control" type="text">
                                    </div>

                                    <div class="col-md-4" style="margin-bottom: 8px;">
                                        <label>Stad:</label>
                                        <input value="{{ $casualty->cas_city }}" class="form-control" type="text">
                                    </div>

                                    <div class="col-md-4" style="margin-bottom: 8px;">
                                        <label>State or Province</label>
                                        <input value="{{ $casualty->cas_st }}" type="text" class="form-control">
                                    </div>

                                    <div class="col-md-4" style="margin-bottom: 8px;">
                                        <label>Region name:</label>
                                        <input value="{{ $casualty->cas_region_name }}" type="text" class="form-control">
                                    </div>
                                </div>
                            </li> {{-- /Casualty data --}}

                            <li class="list-group-item"> {{-- Incident data --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>Incident information:</h4>
                                        <span class="help-block">If the casualty has died in an incident.</span>
                                    </div>

                                    <div class="col-md-4" style="margin-bottom: 8px;">
                                        <label> Category short name.</label>
                                        <input value="{{ $casualty->i_csn }}" class="form-control" type="text">
                                    </div>

                                    <div class="col-md-4" style="margin-bottom: 8px;">
                                        <label>Incident category</label>
                                        <input type="text" value="{{ $casualty->incident_category }}" class="form-control">
                                    </div>

                                    <div class="col-md-4" style="margin-bottom: 8px;">
                                        <label> Incident status date:</label>
                                        <input type="text" value="{{ date('Y/m/d', strtotime($casualty->i_status_dt)) }}" class="form-control">
                                    </div>

                                    <div class="col-md-4" style="margin-bottom: 8px;">
                                        <label> Incident Aircraft</label>
                                        <input type="text" value="{{ $casualty->i_aircraft }}" class="form-control">
                                    </div>

                                    <div class="col-md-offset-4 col-md-4" style="margin-bottom: 8px;">
                                        <label> Hostile death</label>
                                        <input type="text" value="{{ $casualty->i_h }}" class="form-control">
                                    </div>
                                </div>
                            </li> {{-- /Incident data --}}
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