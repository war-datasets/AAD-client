<div class="panel panel-default">
    <div class="panel-heading">
        <span class="fa fa-list" aria-hidden="true"></span> Mijn helpdesk ticketten.
    </div>
    <div class="panel-body">
        @if ((int) count($tickets) === 0) {{-- User has no tickets --}}
            <div class="alert alert-info alert-important" role="alert">
                <strong>Info:</strong> U hebt nog geen support ticketten aangemaakt.
            </div>
        @else {{-- The user has tickets in the system. --}}
            <table class="table table-responsive table-condensed table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category:</th>
                        <th>Subject:</th>
                        <th>Status:</th>
                        <th>Last Updated:</th>
                        <th>Assigned:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket) {{-- Loop through the tickets --}}
                        <tr>
                            <td><strong>#{{ $ticket->id }}</strong></td>
                            <td>{{ $ticket->categories->name }}</td>
                            <td>{{ $ticket->subject }}</td>
                            <td>{{ $ticket->status->name }}</td>
                            <td>{{ $ticket->updated_at->diffForHumans() }}</td>
                            <td>{{ $ticket->assignee->name }}</td>
                        </tr>
                    @endforeach {{-- Tickets --}}
                </tbody>
            </table>

            {{ $tickets->render() }} {{-- Pagination instance --}}
        @endif
    </div>
</div>