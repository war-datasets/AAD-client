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

                        @if ((int) count($messages) > 0) {{-- Petitions found --}}
                            @foreach ($messages as $message)
                                <div style="margin-left: -15px;" class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h4>
                                                <strong>
                                                    <a href="{{ route('news.show', $message) }}">
                                                        {{ $message->title }}
                                                    </a>
                                                </strong>
                                            </h4>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="{{ route('news.show', $message) }}" class="thumbnail">
                                                <img src="{{ asset($message->image_path) }}" alt="{{ $message->title }}">
                                            </a>
                                        </div>

                                        <div class="col-md-9">
                                            <p>{{ strip_tags($message->text) }}</p>
                                            <p>
                                                <a class="btn btn-sm btn-info" href="{{ route('news.show', $message) }}">
                                                    <span class="fa fa-chevron-right" aria-hidden="true"></span> Lees meer
                                                </a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12" style="margin-top: -20px;">
                                            <p></p>

                                            <p>
                                                <i class="fa fa-user" aria-hidden="true"></i> Autheur: {{ $message->author->name }}
                                                | <i class="fa fa-calendar" aria-hidden="true"></i> {{ $message->created_at->format('d/m/Y') }}
                                                | <i class="fa fa-comments" aria-hidden="true"></i> 0 reacties
                                                | <i class="fa fa-tags" aria-hidden="true"></i> Tags:

                                                @if ($message->categories()->count() > 0)
                                                    @foreach($message->categories as $category)
                                                        <span class="label label-danger">{{ $category->name }}</span>
                                                    @endforeach
                                                @else
                                                    <span class="label label-primary">Geen</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{ $messages->render() }} {{-- The pagination instance. --}}
                        @else {{-- No petitions found --}}
                            <div class="alert alert-info alert-important" role="alert">
                                <strong>Info:</strong> Er zijn momenteel geen nieuwsberichten gevonden. Probeer het later nog eens opnieuw.
                            </div>
                        @endif
                    </div>
                </div>
            </div> {{-- /Content --}}

            <div class="col-md-3"> {{-- Sidebar --}}
                <div class="well well-sm"> {{-- Search well --}}
                    <form action="{{ route('news.search') }}" method="GET">
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