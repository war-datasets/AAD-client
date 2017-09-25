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
                        @if (count($messages) > 0) {{-- There are categories found in the system. --}}
                            <table class="table table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <th>Autheur:</th>
                                        <th>Titel:</th>
                                        <th colspan="2">Aangemaakt op:</th> {{-- Colspan 2 needed for the functions. --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $message) {{-- Loop trough the news messages. --}}
                                        <tr>
                                            <td>#{{ $message->id }}</td>
                                            <td>{{ $message->author->name }}</td>
                                            <td>{{ $message->title }}</td>
                                            <td>{{ $message->created_at->format('d/m/Y') }}</td>

                                            <td class="text-center"> {{-- Options --}}
                                                <a href="{{ route('news.show', $message) }}" class="label label-info">Bekijk</a>
                                                <a href="" class="label label-warning">Wijzig</a>
                                                <a href="{{ route('news.delete', $message) }}" class="label label-danger">Verwijder</a>
                                            </td> {{-- /options --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else {{-- There are no categories found. --}}
                            <div class="alert alert-info" role="alert">
                                <strong>Info:</strong> Er zijn geen nieuwsberichten gevonden.
                            </div>
                        @endif
                    </div>
                </div>
            </div> {{-- /Content --}}

            <div class="col-md-3"> {{-- Sidebar --}}
                <div class="well well-sm"> {{-- Search form --}}
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
                </div> {{-- /END search form --}}

                <div class="list-group"> {{-- Options --}}
                    <a href="{{ route('news.create') }}" class="list-group-item">
                        <span class="fa fa-plus" aria-hidden="true"></span> Nieuwsbericht toevoegen.
                    </a>

                    <a href="" class="list-group-item">
                        <span class="fa fa-tags" aria-hidden="true"></span> Categorieen
                    </a>
                </div> {{-- /END options --}}
            </div> {{-- Sidebar --}}
        </div>
    </div>
@endsection