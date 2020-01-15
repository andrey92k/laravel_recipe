	@include('layouts.menu')

<div class="col-md-8 col-lg-9 content-container">
	<div class="row">
		<div class="col-md-8"><h1 class="h3 text-center mt-5">Ингредиенты</h1></div>
	</div>
	
	<section >

		<form method="POST" action="{{route('ingredient.store')}}">
		

			@csrf
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Название</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="ingredient" >
				</div>
			 </div>	
			<button class="btn btn-primary" type="submit">Сохранить</button>
		</form>	

		</section>
</div>
</div>
</div>		


