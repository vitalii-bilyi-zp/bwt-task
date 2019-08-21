@extends('layouts.app')

@section('content')
	<div class="container">
    	<div class="row justify-content-center">
    		@if (count($weather['data']) > 0)
				<div class="col-md-9">
					<div class="page-title mb-4 p-3 border rounded bg-white text-center">
						<h2>{{ isset($weather['title']) ? $weather['title'] : 'Прогноз погоды' }}</h2>
					</div>
				</div>
				<div class="w-100"></div>

	    		@foreach ($weather['data'] as $data)
		        	<div class="col-md-3">
		        		<div class="card text-center">
						    <div class="card-body">
						       	<h5 class="card-title">{{ $data['date'][0] }}</h5>
						       	<h6 class="card-subtitle mb-3 text-muted">{{ $data['date'][1] }}</h6>
						       	<div class="img mb-2">
							    	{!! $data['svg']['element'] !!}
							    </div>
						       	@if (isset($data['temperature']['min']))
								    <div class="temperature-wrapper">
								    	<div class="temperature_c">
								    		<div class="values mb-2">
												<div class="mr-4">
													<small class="text-muted">min:</small>
													<p class="value">{{ $data['temperature']['min']['c'] }}</p>
												</div>
									    		<div>
													<small class="text-muted">max:</small>
													<p class="value">{{ $data['temperature']['max']['c'] }}</p>
												</div>
									    	</div>
									    	<span class="unit text-primary"><b>&deg; C</b></span>
								    	</div>

								    	<div class="temperature_f">
								    		<div class="values mb-2">
												<div class="mr-4">
													<small class="text-muted">min:</small>
													<p class="value">{{ $data['temperature']['min']['f'] }}</p>
												</div>
									    		<div>
													<small class="text-muted">max:</small>
													<p class="value">{{ $data['temperature']['max']['f'] }}</p>
												</div>
									    	</div>
									    	<span class="unit text-primary"><b>&deg; F</b></span>
								    	</div>
								    </div>
								@else
									<div class="temperature-wrapper">
										<div class="temperature_c">
											<p class="value">{{ $data['temperature']['c'] }}</p>
									    	<span class="unit text-primary"><b>&deg; C</b></span>
										</div>

										<div class="temperature_f">
											<p class="value">{{ $data['temperature']['f'] }}</p>
									    	<span class="unit text-primary"><b>&deg; F</b></span>
										</div>
									</div>
								@endif
						    </div>
						</div>
		        	</div>
	        	@endforeach
	        @else
	        	<div class="col-md-8">
	        		<div class="alert alert-danger">
    					<strong>При загрузке информации о погоде произошла ошибка. Пожалуйста, попробуйте еще раз.</strong>
    				</div>
	        	</div>
	        @endif
        </div>
    </div>
@endsection