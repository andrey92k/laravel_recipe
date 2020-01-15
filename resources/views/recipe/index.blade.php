@include('layouts.menu')


<div class="col-md-8 col-lg-9 content-container">
	<div class="row">
		<div class="col-md-8"><h1 class="h3 text-center mt-5">Мои рецепты</h1></div>

		<div class="col-md-4"><a class="btn btn-primary" href="{{route('recipe.create')}}">Добавить рецепт</a></div>
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


						<a style="font-size: 30px;" href="{{route('recipe.show', $recipe->id)}}"><i class="fas fa-eye"></i></a><a  style="font-size: 30px;" href="{{route('recipe.edit', $recipe->id)}}"><i class="fas fa-pencil-ruler"></i></a>						
						<form style="
						display: inline;
						position: relative;
						top: -7px;
						" action="{{route('recipe.destroy', $recipe->id) }}" method="POST">

						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button><i class="fas fa-times"></i></button>
						
					</form>
				</tr>
				@endforeach
			</tbody>
		</table>
	</section>
</div>
</div>
</div>

