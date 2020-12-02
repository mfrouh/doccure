@extends('layout.doctor')
@section('dcontent')
<div class="doc-review review-listing">
	<ul class="comments-list">
        @foreach (auth()->user()->doctor->clinic->reviews as $review)
		<li>
			<div class="comment">
				<img class="avatar rounded-circle" alt="User Image" src="{{asset($review->patient->user->image)}}">
				<div class="comment-body">
					<div class="meta-data">
						<span class="comment-author">{{$review->patient->user->name}}</span>
						<span class="comment-date">{{$review->created_at->diffHumans()}}</span>
						<div class="review-count rating">
							<i class="fas fa-star filled"></i>
							<i class="fas fa-star filled"></i>
							<i class="fas fa-star filled"></i>
							<i class="fas fa-star filled"></i>
							<i class="fas fa-star"></i>
						</div>
					</div>
					<p class="comment-content">
                       {{$review->content}}
                    </p>
				</div>
			</div>
        </li>
        @endforeach
    </ul>
</div>
@endsection
