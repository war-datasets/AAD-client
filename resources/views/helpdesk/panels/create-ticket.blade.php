<div class="panel panel-default">
    <div class="panel-heading">
        <span class="fa fa-plus" aria-hidden="true"></span> Ticket toevoegen.
    </div>

    <div class="panel-body"> {{-- Ticket form --}}
        <form action="{{ route('helpdesk.store') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }} {{-- CSRF Form protection --}}

            <div class="form-group @error('subject', 'has-error')"> {{-- Title form group --}}
                <label class="control-label col-md-3">
                    Onderwerp: <span class="text-danger">*</span>
                </label>
                <div class="col-md-7">
                    <input type="text" @input('subject') class="form-control" placeholder="Titel van het probleem.">
                    @error('subject')
                </div>
            </div> {{-- /Title form group --}}

            <div class="form-group @error('category', 'has-error')"> {{-- Category form-group --}}
                <label class="control-label col-md-3">
                    Categorie: <span class="text-danger">*</span>
                </label>
                <div class="col-md-7">
                    <select @input('category') class="form-control">
                        <option value="">Geen categorie geselecteerd</option>

                        @foreach ($categories as $category) {{-- Loop trough to the categories --}}
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @error('category')
                </div>
            </div> {{-- /Category form-group --}}

            <div class="form-group @error('description', 'has-error')"> {{-- Discription form-group --}}
                <label class="control-label col-md-3">
                    Beschrijving: <span class="text-danger">*</span>
                </label>
                <div class="col-md-9">
                    <textarea @input('description') placeholder="Waarmee kunnen we je helpen?" rows="7" class="form-control">@text('description')</textarea>
                    @if ($errors->has('description'))
                        @error('description')
                    @else
                        <small class="help-block">Dit veld is markdown ondersteund.</small>
                    @endif
                </div>
            </div> {{-- /Description form-group --}}

            <div class="form-group"> {{-- Form options --}}
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-sm btn-success">
                        <span class="fa fa-check" aria-hidden="true"></span> Opslaan
                    </button>

                    <button type="reset" class="btn btn-sm btn-danger">
                        <span class="fa fa-undo" aria-hidden="true"></span> Annuleren
                    </button>
                </div>
            </div> {{-- /END form options --}}
        </form>
    </div> {{-- /Ticket form --}}
</div>