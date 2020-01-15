@include('layouts.menu')

<div class="col-md-8 col-lg-9 content-container">
	<div class="row">
		<div class="col-md-8"><h1 class="h3 text-center mt-5">Ингредиенты</h1></div>
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
					</tr>
					@endforeach
				</tbody>
			</table>

		</section>
</div>
</div>
</div>		