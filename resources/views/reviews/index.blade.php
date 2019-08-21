@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            	<h2 class="card-header text-center">{{ __('Reviews list') }}</h2>

                <div class="card-body">
                	<table class="table table-striped">
					    <thead>
					        <tr>
					            <th scope="col">{{ __('Date') }}</th>
					            <th scope="col">{{ __('Name') }}</th>
					            <th scope="col">{{ __('Message') }}</th>
					        </tr>
					    </thead>
					    <tbody>
					    	@if (count($reviews) > 0)
					    		@foreach ($reviews as $review)
					    			<tr>
							            <td>{{ $review->created_at }}</td>
							            <td>{{ $review->author_name }}</td>
							            <td>{{ $review->message }}</td>
							        </tr>
					    		@endforeach
					    	@else
								<tr>
						            <td colspan="3">Reviews not found</td>
						        </tr>
					    	@endif
					    </tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection