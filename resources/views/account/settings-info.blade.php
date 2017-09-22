<div class="panel panel-default">
    <div class="panel-heading">
        <span class="fa fa-user" aria-hidden="true"></span> Account informatie:
    </div>

    <div class="panel-body">
        <form action="" method="POST" class="form-horizontal">
            {{ csrf_field() }} {{-- CSRF Field protection --}}

            <div class="form-group">
                <label class="control-label col-md-3">
                    Naam: <span class="text-danger">*</span>
                </label>

                <div class="col-md-9">
                    <input type="text" name="name" class="form-control" placeholder="Uw naam">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">
                    E-mail adres: <span class="text-danger">*</span>
                </label>

                <div class="col-md-9">
                    <input type="text" name="email" class="form-control" placeholder="Uw email adres">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-sm btn-success">
                        <span class="fa fa-check" aria-hidden="true"></span> Aanpassen
                    </button>

                    <button type="reset" class="btn btn-link btn-sm">
                        <span class="fa fa-undo" aria-hidden="true"></span> Annuleren
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>