@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            	<h2 class="card-header text-center">Список отзывов</h2>

                <div class="card-body">
                	<table class="table table-striped">
					    <thead>
					        <tr>
					            <th scope="col">Дата</th>
					            <th scope="col">Автор</th>
					            <th scope="col">Сообщение</th>
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
						            <td colspan="3">На данный момент нет ни одного отзыва. <a class="btn btn-link p-0" href="{{ url('reviews/form') }}">Оставить свой.</a></td>
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