@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('casualties.search') }}" method="GET" class="form-inline">
                    <input type="text" name="term" class="form-control" style="width: 25%" placeholder="@lang('casualties.search')">
                    <button class="btn btn-primary">
                        <span class="fa fa-search" aria-hidden="true"></span> @lang('buttons.search')
                    </button>
                </form>
            </div>

            <div style="margin-top: 15px;" class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('casualties.panel-heading', ['number' => number_format((float) $count)])
                    </div>
                    <div class="panel-body">
                        <table class="table table-condensed table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>@lang('casualties.service-no'):</th>
                                <th>@lang('casualties.member-name'):</th>
                                <th>@lang('casualties.birth-date'):</th>
                                <th>@lang('casualties.death-date'):</th>
                                <th>@lang('casualties.death-reason'):</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($casualties as $casualty)
                                    <tr>
                                        <td><code><strong>{{ $casualty->service_no }}</strong></code></td>
                                        <td>
                                            <a href="{{ route('casualties.show.' . $selector, ['id' => $casualty->service_no]) }}">
                                                {{ ucfirst($casualty->member_name) }}
                                            </a>
                                        </td>
                                        <td>
                                            @if (! empty($casualty->birth_date)) {{ date("Y/m/d", strtotime($casualty->birth_date)) . ',' }}  @else Date unknown,  @endif
                                            @if (! empty($casualty->hor_city))   {{ ucfirst($casualty->hor_city) }}      @else Place unknown  @endif
                                        </td>
                                        <td>
                                            @if (! empty($casualty->death_dt))     {{ date('Y/m/d', strtotime($casualty->death_dt)) . ',' }}  @else Date unknown,  @endif
                                            @if (! empty($casualty->oi_location))  {{ ucfirst($casualty->oi_location) }} @else Place unknown  @endif
                                        </td>
                                        <td>{{ ucfirst($casualty->casualty_category) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $casualties->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection