@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9"> {{-- Content --}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="fa fa-newspaper-o" aria-hidden="true"></span> Nieuwsberichten
                    </div>

                    <div class="panel-body">
                    </div>
                </div>
            </div> {{-- /Content --}}

            <div class="col-md-3"> {{-- Sidebar --}}
                <div class="well well-sm"> {{-- Search form --}}
                </div> {{-- /END search form --}}

                <div class="list-group"> {{-- Options --}}
                    <a href="{{ route('news.create') }}" class="list-group-item">
                        <span class="fa fa-plus" aria-hidden="true"></span> Nieuwsbericht toevoegen.
                    </a>
                </div> {{-- /END options --}}
            </div> {{-- Sidebar --}}
        </div>
    </div>
@endsection