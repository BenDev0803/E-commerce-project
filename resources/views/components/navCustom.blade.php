
<nav id="navCustom" class="navbar navbar-expand-lg  navbar-light bg-light ">
    
    <div class="container-fluid mx-1">
            <img src="/media/advertisementt.png" alt="megafono">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
        <div class="collapse  navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-main" aria-current="page" href="{{route('homepage')}}">{{__('ui.home')}}</a>
                </li>
                
                <li class="nav-item">
                <a class="nav-link active" href="{{route('announcement.create')}}">{{__('ui.vendi_presto')}}</a>
                </li>

                <li class="nav-item">
                <a class="nav-link active" href="{{route('announcement.all')}}">{{__('ui.annunci')}}</a>
                </li>
                
                @guest
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('login')}}">{{__('ui.accedi')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('register')}}">{{__('ui.registrati')}}</a>
                </li>
                <div class="mt-1" >
                    <li class="nav-item dropdown">
                    </li>
                </div>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{__('ui.benvenuto')}}, {{Auth::user()->name}}
                    </a> <!-- <i class="fa-solid fa-user"></i> -->
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('contact')}}">{{__('ui.diventa_revi')}}</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{__('ui.logout')}}</a></li> <!--<i class="fa-solid fa-right-from-bracket"></i> -->
                    <form id="form-logout" action="{{route('logout')}}" method="post" style="display:none;">@csrf</form>
                    </ul>
                </li>
                @if(Auth::user() && Auth::user()->is_revisor)
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('revisor.index')}}">
                    {{__('ui.revisor_home')}}
                        <span class="badge badge-pill badge-danger">
                        {{\App\Models\Announcement::ToBeRevisionedCount()}}
                        </span>
                    </a> <!-- <i class="fa-solid fa-user"></i> -->
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('revisor.delete')}}">
                    {{__('ui.annunci_eliminati')}}
                    </a> <!-- <i class="fa-solid fa-user"></i> -->
                    </li>
                @endif
                @endguest 

                <button id="button" class="searchBtn d-flex align-items-center ">
                <i class="fa-solid fa-magnifying-glass-plus"></i>
                </button>
            
                <li class="nav-item d-none" id="searchBar">
                    <form class="d-flex" action="{{route('search')}}" method="GET">               
                        <input type="search" name="q" class=" me-2 form-control" placeholder="{{__('ui.trova_quello')}}" aria-label="Search" autofocus>               
            
                        <button class="btn text-dark btn-cerca" type="submit">GO!</button>               
                    </form>
                </li>
                
                <li class="nav-item ">
                    <form action="{{route('locale', 'es')}}" method="post">
                        @csrf
                        <button type="submit" class="nav-link"
                        style="background-color:transparent; border:none;" >
                            <span class=" shadow lang fi fi-es"></span>
                        </button>
                    </form>
                </li>

                <li class="nav-item ">
                    <form action="{{route('locale', 'en')}}" method="post">
                        @csrf
                        <button type="submit" class="nav-link"
                        style="background-color:transparent; border:none;" >
                            <span class=" shadow lang fi fi-gb"></span>
                        </button>
                    </form>
                </li>
                
                <li class="nav-item ">
                    <form action="{{route('locale', 'de')}}" method="post">
                        @csrf
                        <button type="submit" class="nav-link"
                        style="background-color:transparent; border:none;" >
                            <span class=" shadow lang fi fi-de"></span>
                        </button>
                    </form>
                </li>

                <li class="nav-item ">
                    <form action="{{route('locale', 'it')}}" method="post">
                        @csrf
                        <button type="submit" class="nav-link"
                        style="background-color:transparent; border:none;" >
                            <span class=" shadow lang fi fi-it"></span>
                        </button>
                    </form>
                </li>
                
            </ul>
            
        </div>
    </div>
    
</nav>
       