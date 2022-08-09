<x-layout>
  
  <x-barraCategorie></x-barraCategorie>
  
  <div class="container-fluid ">
    <div class="row justify-content-center align-items-center ">
      <div class="col-12 dett-ann text-white text-center ">
        <h1 class="dett-ann-1">{{__('ui.dettaglio_annuncio')}}</h1>
      </div>
    </div>
  </div>
    
  <div class="container mt-5 mb-5 my-3">
    <div class="row align-items-center">
      <div class="col-12  col-lg-6">
        <div class="row justify-content-end">

          @foreach($announcement->images as $image)
            <div class="d-flex justify-content-center col-12 col-lg-4 my-2 mx-2">
              <img src="{{$image->getUrl(150, 150)}}" class="rounded float-right" alt="">
            </div>
          @endforeach
                
        </div>  
      </div>
            
      <div class="col-12 col-lg-6">
        <h5 class="card-title">{{$announcement->title}}</h5>
        <h6 class="card-subtitle fst-italic">{{$announcement->price}} $</h6>
        <p class="card-text">{{$announcement->description}}</p>
        <hr>
        <p class="card-text">{{$announcement->created_at}}</p>
        <p class="card-text small">{{__('ui.inserito_da')}} <span class="fst-italic ">{{$announcement->user->name}}</span></p>
        <a href="{{route('announcement.all')}}" class="btn btn-custom d-flex justify-content-center align-items-center">{{__('ui.torna_indietro')}}</a>
      </div>
            
    </div>
  </div>

</x-layout>