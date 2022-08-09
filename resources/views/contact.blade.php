<x-layout>
<!-- ========================= header start ========================= -->
<header  class="header">

    <div>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message')}}
            </div>
        @endif
    </div>

    <!-- ========================= contact-section start ========================= -->
    <section id="contact" class="team-section vh-100">
        <div class="shape shape-5">
            <img src="media/shapes/shape-2.svg" alt="">
        </div>
        <div class="shape shape-6">
            <img src="media/shapes/shape-5.svg" alt="">
        </div>
        <div class="container my-1">
            <div class="row">
                <div class="col-lg-12 col-lg-offset-2">
                    <h1 id="titolo-contatti" class="mt-3 mb-15">{{__('ui.diventa_revi')}}</h1>      
                    <form id="contact-form" method="post" action="{{route('submit')}}" role="form">
                    @csrf
                    <div class="messages"></div>
                    <div class="controls">
                        <div class="row my-2">
                            <div class="col-md-6" data-aos="fade-right">
                                <div class="form-group">
                                    <label for="form_name">{{__('ui.nome')}}*</label>
                                    <input id="form_name" type="text" name="name" class="form-control" value="{{Auth::user()->name}}" placeholder="{{__('ui.inserisci_nome')}} *" required="required"    data-error="{{__('ui.campo_obbligatorio')}}">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-6" data-aos="fade-right">
                                <div class="form-group">
                                    <label for="form_email">Email*</label>
                                    <input id="form_email" type="email" name="email" class="form-control" value="{{Auth::user()->email}}" placeholder="{{__('ui.inserisci_email')}} *" required="required" data-error="I{{__('ui.errore_email')}}.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">{{__('ui.messaggio')}}*</label>
                                    <textarea id="form_message" name="message" class="form-control" placeholder="{{__('ui.inserisci_richiesta')}} *" rows="6" required="required" data-error="{{__('ui.errore_richiesta')}}"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12 my-3">
                                <input type="submit" id="invio-mail" class="btn btn-send" value="{{__('ui.invia_richiesta')}}">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-12">
                                <p class="text-muted"><strong>*</strong>{{__('ui.campi_obbligatori')}}</p>
                            </div>
                        </div>
                    </div>
                    </form>
                </div> 
            </div> 
        </div>    
    </section>
    <!-- ========================= contact-section end ========================= -->            
    </header>
    <!-- ========================= header end ========================= -->
</x-layout>