<x-layout>

<div class="container mb-5">
    @if($announcement)

        <div class="row justify-content-center mt-5">
            <div class="col-12 col-lg-10">
                <div class="card">
                    <div class="card-header bg-ann-revi">
                    {{__('ui.annuncio')}} # {{$announcement->id}}
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-3"><h5 class="fst-italic">{{__('ui.utente')}}</h5></div>
                                <div class="col-md-9">
                                    # {{$announcement->user->id}},
                                    {{$announcement->user->name}},
                                    {{$announcement->user->email}},
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-3"><h5 class="fst-italic">{{__('ui.titolo')}}</h5></div>
                                    <div class="col-md-9">{{$announcement->title}}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3"><h5 class="fst-italic">{{__('ui.descrizione')}}</h5></div>
                                            <div class="col-md-9">{{$announcement->description}}</div>
                                            </div>

                                            <div>
                                                <hr>
                                            </div>
                    
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <h5 class="fst-italic">{{__('ui.immagini')}}</h5>

                                                </div>
                                                <div class="col-md-9">
                                                    <div class="row mb-2">
                                                        <div class="col-md-4">
                                                            @foreach($announcement->images as $image)

                                                                <img src="{{$image->getUrl(150, 150)}}" class="rounded float-right" alt="">

                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-2 d-flex align-items-center flex-column justify-content-evenly mt-5">
                                          <!-- Tasto rigetta -->
                                    <div class="col-md-6 my-3 text-center">
                                        <form action="{{route('revisor.cancel' , $announcement->id)}}" method="post">
                                        @csrf
                                            <button type="submit" class="btn p-4 text-white btn-elimina">
                                            {{__('ui.elimina')}}
                                            </button>
                                        </form>
                                    </div>
                                          <!-- Tasto rigetta -->
                                    <div class="col-md-6 my-3 text-center">
                                        <form action="{{route('revisor.accept' , $announcement->id)}}" method="post">
                                        @csrf
                                            <button type="submit" class="btn p-4 text-white btn-accetta">
                                            {{__('ui.accetta')}}
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
       
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    @else
        <div class="row mt-3 justify-content-center text-center">
            <div class="col-12 col-lg-10">
                <h3>
                    {{__('ui.no_nuovi_annunci')}}
                </h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-3">
                    <a href="{{route('homepage')}}" class="btn btn-indietro">{{__('ui.torna_indietro')}}</a>
                </div>
            </div>
        </div>
        
    @endif
</div>
</x-layout>