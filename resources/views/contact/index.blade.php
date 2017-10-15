@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="fa fa-info-circle" aria-hidden="true"></span> Heb je een vraag? Aarzel dan niet om ons te contacteren.
					</div>

					<div class="panel-body">
						<form method="POST" action="{{ route('contact.store') }}" class="form-horizontal">
							{{ csrf_field() }} {{-- CSRF Field protection --}}

							<div class="form-group"> {{-- Name form-group --}}
								<div class="col-md-6"> {{-- First name field --}}
									<input type="text" name="first_name" class="form-control" placeholder="Uw Voornaam">
								</div>

								<div class="col-md-6"> {{-- Last name --}}
									<input type="text" name="last_name" class="form-control" placeholder="Uw achternaam">
								</div>
							</div>

							<div class="form-group"> {{-- Email form-group --}}
								<div class="col-md-12">
									<input type="email" class="form-control" name="email" placeholder="Uw email adres.">
								</div>
							</div>

							<div class="form-group"> {{-- Subject form group --}}
								<div class="col-md-12">
									<input type="text" class="form-control" name="subject" placeholder="Het onderwerp van het bericht.">
								</div>
							</div>

							<div class="form-group"> {{-- Message form-group --}}
								<div class="col-md-12">
									<textarea class="form-control" name="message" placeholder="Uw bericht" rows="7"></textarea>
								</div>
							</div>

							<div class="form-group"> {{-- Option form-group --}}
								<div class="col-md-12">
									<button type="submit" class="btn btn-sm btn-success">
										<span class="fa fa-check" aria-hidden="true"></span> Verzenden
									</button>

									<button type="reset" class="btn btn-sm btn-link">
										<span class="fa fa-undo" aria-hidden="true"></span> Annuleren
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
