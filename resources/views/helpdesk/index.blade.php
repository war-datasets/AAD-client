@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message') {{-- Flash session instance --}}

        <div class="row">
            <div class="col-md-12"> {{-- Menu bar --}}
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav nav-pills">
                            <li role="presentation" class="active">
                                <a href="#userTickets" aria-controls="userTickets" role="tab" data-toggle="tab">Mijn ticketten</a>
                            </li>
                            <li role="presentation">
                                <a href="#new" aria-controls="new" role="tab" data-toggle="tab">Nieuw ticket</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> {{-- /Menu bar --}}

            <div class="col-md-12"> {{-- Data containers --}}
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="userTickets"> @include('helpdesk.panels.user-tickets')  </div>
                    <div role="tabpanel" class="tab-pane" id="new">                @include('helpdesk.panels.create-ticket') </div>
                </div>
            </div> {{-- /Data containers --}}
        </div>
    </div>
@endsection