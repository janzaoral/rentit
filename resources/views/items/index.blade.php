@extends('layouts.app')

@section('view', 'item-index')

@section('content')

<div class="item-list">
	<div class="container">

		<div class="category-picker">
			<div class="category-picker__title">Kategorie</div>
			<div class="category-picker__dropdown">
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
						{{ $category === null ? 'Vše' : $category->name }}
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li>
							<a href="{{ action('ItemsController@index') }}">
								Vše
							</a>
						</li>
						@foreach ($categories as $category)
							<li>
								<a href="{{ action('ItemsController@categoryIndex', $category) }}">
									{{ $category->name }}
								</a>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>

		<div class="item-tile-container">
			@foreach($items as $item)
				<a class="card item-tile" href="{{ action('ItemsController@show', $item) }}">
					@if ($item->image !== null)
						<img class="image item-tile__image" src="{{ url($item->image) }}" />
					@endif
					<div class="card__content">
						<div class="item-tile__name">{{ ucfirst($item->title) }}</div>
						<div class="item-tile__price">{{ number_format($item->price, 0, ",", " ") }} Kč</div>
						<div class="item-tile__category">{{ $item->category->name }}</div>
						<div class="item-tile__description">{{ str_limit($item->description) }}</div>
					</div>
				</a>
			@endforeach
		</div>

		<div class="item-index__pagination">
			{{ $items->links() }}
		</div>

	</div>
</div>

@endsection