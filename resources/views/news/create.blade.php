@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="fa fa-plus" aria-hidden="true"></span> Nieuwsbericht toevoegen.
                    </div>

					<div class="panel-body"> {{-- /News create form --}}
						<form class="form-horizontal" method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
							{{ csrf_field() }} {{-- CSRF field protection. --}}

							<div class="form-group"> {{-- Title form group for the news message --}}
                                <label class="control-label col-md-3">
                                    Titel: <span class="text-danger">*</span>
                                </label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Titel van het nieuwsbericht" name="title">
                                </div>
							</div>

                            <div class="form-group">
                                <label class="control-label col-md-3">
                                    Afbeelding: <span class="text-danger">*</span>
                                </label>

                                <div class="col-md-9">
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>

                            <div class="form-group"> {{-- Categories form-group --}}
                                <label class="control-label col-md-3">
                                    Categorieen: {{-- <span class="text-danger">*</span> --}}
                                </label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Bericht categorieen" name="categories">
                                    <small class="help-block">* Categorieen worden gesplitst met een comman teken.</small>
                                </div>
                            </div>

                            <div class="form-group"> {{-- News message form-group --}}
                                <label class="control-label col-md-3">
                                    Bericht: <span class="text-danger">*</span>
                                </label>

                                <div class="col-md-9">
                                    <textarea name="text" placeholder="Uw nieuws bericht." class="form-control" rows="7"></textarea>
                                    <small class="help-block">Dit veld is markdown ondersteund.</small>
                                </div>
                            </div>

							<div class="form-group"> {{-- Option buttons --}}
								<div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <span class="fa fa-check" aria-hidden="true"></span> Opslaan
                                    </button>

                                    <button type="reset" class="btn btn-sm btn-link">
                                        <span class="fa fa-link" aria-hidden="true"></span> Aanuleren
                                    </button>
                                </div>
							</div>

						</form>
					</div> {{-- /END news create form --}}
                </div>
            </div>
        </div>
    </div>
@endsection
