<x-layout>
    
  <x-barraCategorie></x-barraCategorie>  

  <div class="container-fluid ">
    <div class="row justify-content-center align-items-center ">
      <div class="col-12 dett-ann text-white text-center ">
        <h1 class="dett-ann-1">{{$category->name}}</h1>
      </div>
    </div>
  </div>


    

  <div class="row justify-content-around align-items-center ">

    @foreach($announcements as $announcement)
            
      <div class="col-12 sm-vh50 col-lg-2 mx-5 my-2">
        <div class="card border card-hover mx-3">
          <div class=" text-center ">
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

              <a  href="{{route('announcement.show', compact('announcement'))}}" ></a>
              
              <h5 class="card-title text-center">{{ $announcement->title}}</h5>
              <h6>{{ $announcement->price}} $</h6>

            </a>
          </div>
        </div>
      </div>
            
    @endforeach

  </div>

</x-layout>