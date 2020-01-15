@include('layouts.default')

  <div class="container-fluid">
      <div class="row">
         <div class="col-md-10">
          <i style="font-size: 30px;" class="fas fa-utensils"></i>
          <a class="navbar-brand" href="#">Название сай</a>
         </div>
         <div class="col-md-2">
            @include('layouts.app')
         </div>
      
      </div>

        <div class="row">
            <div class="col-md-4 col-lg-3 navbar-container bg-light">
                <nav class="navbar navbar-expand-md navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar">
                        <!-- Вертикальное меню -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('recipe.index')}}">Рецепты</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('ingredient.index')}}">Ингредиенты</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

  