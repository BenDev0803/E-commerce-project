 <!-- Sezione con due contatori -->
    
<section class="container  bg-white my-4 ">

    <div class="row">
        <div class="col-12">
        <h1 class="display-3 text-center">{{__('ui.perchè_presto')}}</h1>
        </div>
    </div>

    <div class="row vh-section-counter justify-content-evenly align-items-center">

        <div class="col-7 col-md-3 border-counters shadow sec-bg text-center" data-aos="fade-right">
            <i class="fa-solid pt-3 text-main fa-thumbs-up fa-4x"></i>
            <h4 class="my-3">{{__('ui.recensioni_positive')}}</h4>
                
            <div class="row justify-content-center">
                <div class="col-8 d-flex justify-content-center">
                    <p class="counter-custom" id="recensioniPositive">0 <span>%</span></p> 
                    </div>
            </div>
        </div>

        <div  class="col-7 col-md-3 shadow my-5 border-counters sec-bg text-center" data-aos="fade-up">
            <i class="fa-solid pt-3 text-main fa-thumbs-up fa-4x"></i>

            <h4 class="my-3">{{__('ui.annunci_inseriti')}}</h4>
            <div class="row justify-content-center">
                <div class="col-8 d-flex justify-content-center">
                    <p class="counter-custom" id="annunciInseriti">0 <span></span></p> 

                </div>

            </div>
        </div>
    
        <div class="col-7 col-md-3 shadow border-counters sec-bg text-center" data-aos="fade-left">

            <i class="fa-solid pt-3 text-main fa-people-carry-box fa-4x"></i>
            <h4 class="my-3">
                {{__('ui.prodotti_venduti')}}
            </h4>
            <div class="row justify-content-center">
                <div class="col-7 d-flex justify-content-center">
                    <p class="counter-custom" id= prodottiVenduti>0</p>
                </div>
            </div>

        </div>

    </div>

        
    
</section>