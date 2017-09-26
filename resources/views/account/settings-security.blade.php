<div class="panel panel-default">
    <div class="panel-heading">
        <span class="fa fa-key" aria-hidden="true"></span> Account beveiliging
    </div>

    <div class="panel-body">
        <form method="POST" class="form-horizontal" action="{{ route('account.settings.security') }}">
			{{-- TODO: Implement validation errors. --}}
            {{ csrf_field() }} {{-- CSRF field protection --}}

            <div class="form-group">
                <label class="control-label col-md-3">
                    Nieuw wachtwoord: <span class="text-danger">*</span>
                </label>

                <div class="col-md-9">
                    <input type="password" class="form-control" name="password" placeholder="Nieuw wachtwoord">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">
                    Herhaal wachtwoord: <span class="text-danger">*</span>
                </label>

                <div class="col-md-9">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Herhaal wachtwoord">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-sm btn-success">
                        <span class="fa fa-check" aria-hidden="true"></span> Aanpassen
                    </button>

                    <button type="reset" class="btn btn-link btn--sm">
                        <span class="fa fa-undo" aria-hidden="true"></span> Annuleren
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
