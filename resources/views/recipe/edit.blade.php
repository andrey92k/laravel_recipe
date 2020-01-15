		
@include('layouts.menu')
<div class="col-md-8 col-lg-9 content-container"> 
  <section >
    <h2>Редактирование рецепта:</h2>

    <form method="POST" action="{{route('recipe.update', $recipe->id )}}">
      @method('PATCH')
      @csrf

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Название рецепта</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" name="name" value="{{ $recipe->name }}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Описание рецепта</label>
        <div class="col-sm-10">
        <textarea class="form-control" name="description" rows="3">{{ $recipe->description }}</textarea>
         </div>
      </div>
      <div class="border-bottom"></div>

      <div class="row">
        <div class="col">
          <p>Ингрединты</p>
        </div>
        <div class="col">
          <p>Количества</p>
        </div>
      </div>
      <div class="inputs">
      @forelse ($ingredients as $ingredient)
      <div class="row">
        <div class="col-sm-6">
        <select  class="form-control" name="ingredient[]">

          @foreach ($allIngredients as $allIngredient)
          @if ($allIngredient->name == $ingredient->name)
          <option selected value="{{ $allIngredient->name }}">{{ $allIngredient->name }}</option>
          @else
          <option value="{{ $allIngredient->name }}">{{ $allIngredient->name }}</option>
          @endif


          @endforeach
        </select>
        </div>
        <div class="col-sm-4">
        <input type="text" class="form-control" name="quantity[]" value="{{$ingredient->getOriginal()['pivot_quantity']}}">
        </div>
         <div class="col-sm-2">
        <i class="fas fa-times del"></i>
        </div>        
      </div>

      @empty
      <div class="row">
      <div class="col-sm-6">
      <select  class="form-control" name="ingredient[]">

        @foreach ($allIngredients as $allIngredient)
        @if ($allIngredient->name)
        <option value="{{ $allIngredient->name }}">{{ $allIngredient->name }}</option>
        @endif
        @endforeach


      </select>
      </div>
      <div class="col-sm-4">
      <input type="text" class="form-control" name="quantity[]">
         </div>  
      <div class="col-sm-2">
        <i class="fas fa-times del"></i>
      </div>    
    
      @endforelse               
      </div>
       <div class="row">
       <div class="col-sm-6">  
      <input class="btn btn-light" type="button" onclick="add_input()" value="Добавить" />
      </div>
      <div class="col-sm-2">  
        <p>Нет в списке?</p>
      </div>
      <div class="col-sm-4">    
      <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalCenter">Создать новый ингредиент</button>
    </div>
     </div>   
      <div class="row">
        <div class="col-md-4">
        <button type="submit" class="btn btn-success">Сохранить</button>
      </div>
      </div>

    </form>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Добавление ингредиента</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <label>Название</label>
            <input type="text" class="form-control" name="ingredient">

            <div class="modal-footer">
              <button onclick="add_ingredient()" type="button" class="btn btn-primary">Добавить</button>
            </div>
          </div>
        </div>
      </div>
    </div>


    

  </section>
</div>
</div>
</div>
<script>
  function add_input(){
            //var inputs = $('select[name="ingredient[]"]');
            var input = $('select[name="ingredient[]"]').html();
            var new_id = input.length+1;
            $('.inputs').append('<div class="row"><div class="col-sm-6"><select class="form-control" name="ingredient[]">' + input + '</select></div> <div class="col-sm-4"><input class="form-control" type="text" name="quantity[]" value=""></div><div class="col-sm-2"><i class="fas fa-times del"></i></div></div> ');
          }
  function add_ingredient(){

            var inputs = $('input[name="ingredient"]').val();
            $.ajax({
              url: "{{route('ajaxstore.ajaxstore')}}",
              method: 'POST',
              data: {
                _token: '{{csrf_token()}}',
                ingredient: inputs
              }
            }).done(function (data) {
              var data = JSON.parse(data);

              $('select[name="ingredient[]"]').append('<option value="' + data.name + '">' + data.name + '</option>');
              $('.close').click();
              $('input[name="ingredient"]').val(''); 
            });

  }
$('.del').click(function() {
  $(this).parent().parent().remove();
});  
</script>




