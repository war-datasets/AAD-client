@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message') {{-- Flash message instance. --}}

        <div class="row">
            <div class="col-md-12"> {{-- Content --}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        User management:

                        <div class="pull-right">
                            <a href="" class="btn btn-xs btn-primary">
                                <span class="fa fa-plus" aria-hidden="true"></span> Create user
                            </a>

                            <a href="" class="btn btn-xs btn-success">
                                <span class="fa fa-search" aria-hidden="true"></span> Search user
                            </a>
                        </div>
                    </div>

                    <div class="panel-body">
                        @if ((int) count($users) === 0) {{-- No users found in the system. --}}
                        @else {{-- There are users found in the system. --}}
                            <table class="table table-responsive table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Status:</th>
                                        <th>Name:</th>
                                        <th>Email:</th>
                                        <th colspan="2">Created at:</th> {{-- colspan="2" needed for the functions. --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user) {{-- Loop through the users. --}}
                                        <tr>
                                            <td><strong>#{{ $user->id }}</strong></td>
                                            <td>{{-- TODO: Implement laravel ban. --}}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at->diffForHumans() }}</td>

                                            <td class="text-center"> {{-- Options --}}
                                                <a href="" data-toggle="tooltip" data-placement="bottom" title="Info">
                                                    <i class="text-muted fa fa-fw fa-info-circle"></i>
                                                </a>
                                                <a href="" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                    <i class="text-muted fa fa-fw fa-pencil"></i>
                                                </a>
                                                <a href="" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                                    <i class="text-muted fa fa-fw fa-trash-o"></i>
                                                </a>
                                                <a href="" data-toggle="tooltip" data-placement="bottom" title="Ban">
                                                    <i class="text-muted fa fa-fw fa-ban"></i>
                                                </a>
                                                <a href="" data-toggle="tooltip" data-placement="bottom" title="Make admin">
                                                    <i class="text-muted fa fa-fw fa-unlock"></i>
                                                </a>
                                            </td> {{-- /Options --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $users->render() }} {{-- Pagination instance. --}}
                        @endif
                    </div>
                </div>
            </div> {{-- /Content --}}
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush