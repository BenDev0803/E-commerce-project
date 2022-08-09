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
                        <div class="col-md-3 fst-italic"><h5>{{__('ui.utente')}}</h5></div>

                        <div class="col-md-9">
                            # {{$announcement->user->id}},
                            {{$announcement->user->name}},
                            {{$announcement->user->email}},
                        </div>

                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-3 "><h5 class="fst-italic">{{__('ui.titolo')}}</h5></div>
                        <div class="col-md-9">{{$announcement->title}}</div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-3 "><h5 class="fst-italic">{{__('ui.descrizione')}}</h5></div>
                        <div class="col-md-9">{{$announcement->description}}</div>
                    </div>

                    <div>
                        <hr>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-2">
                            <h5 class="fst-italic">{{__('ui.immagini')}}</h5>

                        </div>

                        <div class="col-md-9">
                            <div class="row mb-2 justify-content-center">
                                
                                @foreach($announcement->images as $image)
                                <div class="col-12 col-md-8 mb-5">
                                    <div class="row justify-content-between">
                                        <div class="col-12 d-flex flex-column  align-items-start col-md-4">

                                            <img src="{{$image->getUrl(150, 150)}}" class="rounded  float-right" alt="">
                                        </div>
                                            
                                        <div class="col-12 col-md-4">
                                            Adult: {{$image->adult}} <hr>
                                            Spoof: {{$image->spoof}} <hr>
                                            Medical: {{$image->medical}} <hr>
                                            Violence: {{$image->violence}} <hr>
                                            Racy: {{$image->racy}}<hr>

                                        </div>

                                        <div class="col-12 col-md-4">
                                            <b>Labels</b><br>
                                            <ul>
                                                @if($image->labels)
                                                @foreach($image->labels as $label)
                                                <li>{{$label}}</li>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                           
                            </div>
                            
                        </div>
                            
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-2 d-flex align-items-center flex-column justify-content-evenly mt-5">
                    <!-- Tasto rigetta -->
            <div class="col-md-6 my-3 text-center">

                <form action="{{route('revisor.reject' , $announcement->id)}}" method="post">
                    @csrf
                    <button type="submit" class="btn p-4 text-white btn-elimina">
                    {{__('ui.elimina')}}
                    </button>
                </form>

            </div>
                    <!-- Tasto accetta -->
            <div class="col-md-6 my-3 text-center">
                
                <form action="{{route('revisor.accept' , $announcement->id)}}" method="post">
                        @csrf
                    <button type="submit" class="btn text-white p-4 btn-accetta">
                        {{__('ui.accetta')}}
                    </button>
                </form>

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