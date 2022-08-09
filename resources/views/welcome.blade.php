<x-layout>

@if (session('flash'))
    <div class="alert alert-success">
        {{ session('flash') }}
    </div>
@endif

@if (session('ciao'))
    <div class="alert alert-success">
        {{ session('ciao') }}
    </div>
@endif

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

@if (session('acccess.denied.revisor.only'))
    <div class="alert alert-danger">
        Accesso non consentito - solo per revisori
    </div>
@endif


<!-- Sezione 1 -->
  <!-- Header Mobile -->

<div class="headerMobile row position-relative">

  <div class="row justify-content-center">
    <img class="logoMobile" src="/media/logogiallo.png" alt="megafono">
    <a class="nav-link active d-flex justify-content-center align-items-center" href="{{route('announcement.all')}}">
      <button type="submit" class="btn text-white  d-flex justify-content-center align-items-center btn-custom">
        Tutti gli annunci
      </button>
    </a>
  </div>

</div>


<!-- Header Desktop -->

<div class="container-fluid bg-header vh-80 align-items-center"> 

  <div class="row justify-content-center align-items-center vh-80 padding-title ">

    <div class="col-12 col-lg-7 d-flex align justify-content-center">

      <div class="col-8 pb-5" data-aos="fade-right" data-aos-duration="1500">
        
        <h1  class="display-5  none">
         
          {{__('ui.titolo1')}}
             
        </h1>

          <div class="row">

            <div class="col-12 pb-5 col-lg-3">

              <a class="nav-link active" href="{{route('announcement.all')}}">

                <button data-aos="fade-right" data-aos-duration="2000" type="submit" class="btn text-white d-flex justify-content-center align-items-center btn-custom">
                   PRESTO!
                  </button>

              </a>

            </div>

          </div>

      </div>

    </div>

  </div>

</div>


<!-- SEZIONE 2 -->
  <!-- Barra Categorie -->

<x-barraCategorie></x-barraCategorie>
                
                
<!-- SEZIONE 3 -->
  <!-- CARD -->
          
<div class="container-fluid ">

  <div class="row justify-content-center align-items-center">

    <h1 class="display-3 text-center">{{__('ui.ultimiannunci')}}</h1>

    <div class="row justify-content-center align-items-center">
      <div class="col-2 linea">
            
      </div>
    </div>
      
    <div class="row justify-content-around align-items-center ">
      @foreach($announcements as $announcement)
          
        <div class="col-9 sm-vh50 col-lg-2 mx-5">
          <div class="card border card-hover mx-3">
            <div class=" text-center">
              <a class="card-link" href="{{route('announcement.show', compact('announcement'))}}">
                @foreach($announcement->images as $image)

                  @if($loop -> first)
                  <img class="card-img-top shadow" src='{{$image->getUrl(150, 150)}}' alt="Copertina {{$announcement->name}}">
                  @endif

                @endforeach
                  
                <a class="card-link " href="{{route('announcement.index', [
                  $announcement->category->name,
                  $announcement->category->id,
                  ]
                  )}}"> 
                </a>

                <a  href="{{route('announcement.show', compact('announcement'))}}" >
                </a>
                
                <h5 class="card-title text-center">{{ $announcement->title}}</h5>
                <h6>{{ $announcement->price}} $</h6>

              </a>
            </div>
          </div>
        </div>
            
      @endforeach
    </div>

  </div>

</div>


<!-- SEZIONE 4 -->
  <!-- Contatori -->

<div class="container-fluid  bg-white vh-70 align-items-center">  
  <div class="row justify-content-center "> 
    <x-contatore></x-contatore>
    </div>
</div>

</x-layout>