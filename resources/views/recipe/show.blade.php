@include('layouts.menu')
<div class="col-md-8 col-lg-9 content-container">	
	<section >
		<h2>{{ $recipe->name }}</h2>

		<p class="text-justify">{{ $recipe->description }}</p>

		<h3>Ингредиенты</h3>
		<div class="row">

			@foreach ($ingredients as $ingredient)
			<div class="col-md-9 push-md-3 border-top border-bottom">{{ $ingredient->name }}</div>
			<div class="col-md-3 pull-md-9 border-top border-bottom"><input class="form-control" onkeyup="edit_quntity({{ $ingredient->id }})" id='{{ $ingredient->id }}' type="text" name="quantity[]" value="{{$ingredient->getOriginal()['pivot_quantity']}}"></div>
			@endforeach
		</div>

		

	</section>
</div>
</div>
</div>
<script type="text/javascript">

function edit_quntity(id){

			setTimeout(function(){
			console.log($('#'+id).val());
            $.ajax({
            	url: "{{route('ajaxquantity.ajaxquantity')}}",
            	method: 'POST',
            	data: {
            		_token: '{{csrf_token()}}',
            		id: id,
            		quantity: $('#'+id).val(),
            	}
            }).done(function (data) {
            });
            }, 2000);


        }

</script>	
