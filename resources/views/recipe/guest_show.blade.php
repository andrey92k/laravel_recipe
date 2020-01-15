@include('layouts.menu')
<div class="col-md-8 col-lg-9 content-container">	
	<section >
		<h2>{{ $recipe->name }}</h2>

		<p class="text-justify">{{ $recipe->description }}</p>

		<div class="row">
			@foreach ($ingredients as $ingredient)
			<div class="col-md-9 push-md-3 border-top border-bottom">{{ $ingredient->name }}</div>
			<div class="col-md-3 pull-md-9 border-top border-bottom">{{$ingredient->getOriginal()['pivot_quantity']}}</div>
			@endforeach
		</div>		
	</section>
</div>
</div>
</div>

