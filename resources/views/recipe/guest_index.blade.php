@include('layouts.menu')


<div class="col-md-8 col-lg-9 content-container">
	<div class="row">
		<div class="col-md-8"><h1 class="h3 text-center mt-5">Мои рецепты</h1></div>
	</div>
	
	<section >
		
		<table class="table">
			<thead>
				<tr>
					
					<th scope="col">Рецепт</th>
					<th scope="col">Описание</th>
					<th scope="col">Действия</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($recipes as $recipe)
				<tr>
					
					<td>{{ $recipe->name }}</td>
					<td>{{ $recipe->description }}</td>

					<td>
						<a style="font-size: 30px;" href="{{route('recipe.show', $recipe->id)}}"><i class="fas fa-eye"></i></a>						
				</tr>
				@endforeach
			</tbody>
		</table>
	</section>
</div>
</div>
</div>

