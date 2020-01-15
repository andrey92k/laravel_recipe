@include('layouts.menu')

<div class="col-md-8 col-lg-9 content-container">
	<div class="row">
		<div class="col-md-8"><h1 class="h3 text-center mt-5">Ингредиенты</h1></div>

		<div class="col-md-4"><a class="btn btn-primary" href="{{route('ingredient.create')}}">Добавить ингредиент</a></div>
	</div>
	
	<section >
			<table class="table">
				<thead>
					<tr>
						
						<th scope="col">Название</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($allIngredients as $ingredient)
					<tr>
						<td>{{ $ingredient->name }}</td>
						<td><a style="font-size: 30px;" href="{{route('ingredient.edit', $ingredient->id)}}"><i class="fas fa-pencil-ruler"></i></a>						
						<form style="
						display: inline;
						position: relative;
						top: -7px;
						" action="{{route('ingredient.destroy', $ingredient->id) }}" method="POST">

						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button><i class="fas fa-times"></i></button>

						
					</form>
				</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</section>
</div>
</div>
</div>			