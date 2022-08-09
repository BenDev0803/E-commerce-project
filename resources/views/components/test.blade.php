<div class="mt-1 mb-5 flex-center">
    <div class="row test text-center ">
        <div class="col-2"><h4><a href="{{route('homepage')}}">PRESTO.IT</a></h4></div>
        <div class="col-6 bg-danger">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </form>
        </div>
        <div class="col-2"><button>vendi subito</button></div>
        <div class="col-1">
            @guest
            <a href="{{route('login')}}"><button><i class="fa-regular fa-circle-user"></i></button></a>
            @else
            <div class="dropdown text-center">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-regular fa-circle-user"></i>
                </button>
                <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton1">
                    <li><strong>Benvenuto, {{Auth::user()->name}}</strong></li>
                    <li><a class="dropdown-item" href="#">I tuoi annunci</a></li>
                    <li><a class="dropdown-item" href="#">Impostazioni</a></li>
                    <li><li><a class="dropdown-item" href="" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li> 
                    <form id="form-logout" action="{{route('logout')}}" method="post" style="display:none;">@csrf</form></li>
                    @if(Auth::user() && Auth::user()->is_revisor)
                    <li><a class="dropdown-item" href="{{route('revisor.index')}}">Moderatore</a></li>
                </ul>
            </div>
            
            @endif
            @endguest 
        </div>
        <div class="col-1 bg-success">it <i class="flag flag-it"></i></div>
    </div>
    <div class="row border-bottom mb-5">
        <div class="col-12">
            
            <ul class="list-group list-group-horizontal justify-content-center">
                <li class="list-group mx-2 border-end">Chi siamo</li>
                <li class="list-group mx-2 border-end">Offerte</li>
                <li class="list-group mx-2 border-end">Novità</li>
                <li class="list-group mx-2 border-end">Mi sento fortunato</li>
                <li class="list-group mx-2">Lavora con noi</li>
            </ul>
        </div>
    </div>
</div>