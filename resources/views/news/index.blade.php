@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9"> {{-- Content --}}
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="page-header" style="margin-top: -20px;">
                            <h2 class="margin-page-header">Nieuwsberichten.</h2>
                        </div>
                    </div>
                </div>
            </div> {{-- /Content --}}

            <div class="col-md-3"> {{-- Sidebar --}}
                <div class="well well-sm"> {{-- Search well --}}
                    <form action="" method="GET">
                        <div class="input-group">
                            <input type="text" name="term" class="form-control" placeholder="Zoek nieuwsbericht">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div> {{-- /Search well --}}

                <div class="panel panel-default"> {{-- Category box --}}
                    <div class="panel-heading">
                        <span class="fa fa-tags" aria-hidden="true"></span> Categorieen:
                    </div>

                    <div class="panel-body">
                        @if (count($categories) > 0) {{--  There are categories found.--}}
                            @foreach ($categories as $category) {{-- Loop trough the categories --}}
                                <a href="" class="label label-success">{{ $category->name }}</a>
                            @endforeach
                        @else {{-- There are no categories found --}}
                            <small class="text-muted"><i>(Er zijn geen categorieen gevonden.)</i></small>
                        @endif
                    </div>
                </div> {{-- /Category box --}}
            </div> {{-- /Sidebar --}}
        </div>
    </div>
@endsection