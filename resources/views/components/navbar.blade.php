<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('homepage')}}">
      <h4>Presto</h4>              
    </a>
    <!-- BOTTONE CHE PERMETTE DROPDOWN A SCHERMO MEDIO/PICCOLO -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- DIV CHE CONTIENE TUTTO IN UNA UL -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  d-flex justify-content-between text-center me-auto mb-2 mb-lg-0">
        <!--<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
        </li> -->
        <li class="nav-item">
          <div class="container-fluid">
            <div class="input-group ">
              <!-- GESTIRE IN BACKEND LA SELECT -->
              <select class=" form-select input-group-text" id="basic-addon1">
                <option selected>Categorie
                @foreach($categories as $category)
                  
                  <a href="{{route('announcement.index', [
                              $category->name,
                              $category->id,
                              ]
                              )}}"
                              >
                              <option>{{$category->name}}</option></a>

                @endforeach
              </select>
                

                
                  
              <!-- GESTIRE IN BACKEND LA RICERCA -->
              <form action="{{route('search')}}" method="GET">               
                <input type="text" name="q" class="form-control" placeholder="Trova quello che ti serve">               
                
                <span><button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button></span>               
              </form>
              
            </div>
      </div>
        


        <li class="nav-item ">
          <a class="nav-link active" href="{{route('announcement.create')}}">Vendi Presto!</a>
        </li>
        
       
        @guest  
       <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Benvenuto
          </a> -->
          <!--<ul class="dropdown-menu" aria-labelledby="navbarDropdown"> SE DECOMMENTI GLI SPAN DEVONO TORNARE LI -->
          <span>
            <a class="nav-link " href="{{route('login')}}">Login</a>
          </span>  
          <!--<i class="fa-solid fa-right-from-bracket"></i> -->
          <span>
            <a class="nav-link " href="{{route('register')}}">Registrati</a>  
          </span>
            <!-- </ul> -->
        </li>
        @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Benvenuto, {{Auth::user()->name}}
          </a> <!-- <i class="fa-solid fa-user"></i> -->
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="">Il tuo profilo</a></li>
            <li><a class="dropdown-item" href="{{route('contact')}}">Diventa revisore</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li> <!--<i class="fa-solid fa-right-from-bracket"></i> -->
            <form id="form-logout" action="{{route('logout')}}" method="post" style="display:none;">@csrf</form>
          </ul>
        </li>
        @if(Auth::user() && Auth::user()->is_revisor)
        <li class="nav-item">
          <a class="nav-link" href="{{route('revisor.index')}}">
            Revisor home
            <span class="">
              {{\App\Models\Announcement::ToBeRevisionedCount()}}
            </span>
          </a> <!-- <i class="fa-solid fa-user"></i> -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('revisor.delete')}}">
            Annunci eliminati
          </a> <!-- <i class="fa-solid fa-user"></i> -->
        </li>
        @endif
        @endguest 

        <li class="nav-item">
        @include('_locale', ['lang' => 'en', 'nation' => 'gb'])
        </li>

        <li class="nav-item">
        @include('_locale', ['lang' => 'es', 'nation' => 'es'])
        </li>
        <li class="nav-item">
        @include('_locale', ['lang' => 'it', 'nation' => 'it'])
        </li>

      </ul>
    </div>
  </div>
</nav>