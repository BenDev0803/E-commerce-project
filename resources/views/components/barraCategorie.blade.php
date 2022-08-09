<!-- BOTTONI CATEGORIE-->

<div class="container-fluid none " >
  <div id="categoryBar" class="row  justify-content-center">
    
    @foreach($categories as $category)
      <div id="category" class="col-12 justify-content-center d-flex align-items-center col-lg-1 ">
        <a class='nav-link text-white link-category'  data-aos="fade-right" data-aos-duration="1000" href="{{route('announcement.index', [
          $category->name,
          $category->id,
          ]
          )}}"
          >
          {{$category->name}}
        </a>
      </div>
    @endforeach
        
  </div>
</div>
          
<!-- BARRA CATEGORIE MOBILE -->
<!-- ACCORDION -->
<div class="container-fluid bg-accordion ">

  <div class="accordion accordion-custom accordion-flush  " id="accordionFlushExample">
    <div class=" accordion-item d-flex justify-content-center bg-accordion ">
      <h2 class="accordion-header " id="flush-headingOne">
        <button class=" accordion-button  bg-accordion collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"              aria-controls="flush-collapseOne">
        <p class="nav-link link-category  text-white nav-link-accordion">Categorie</p>
        </button>
      </h2>
      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">

        <div class="accordion-body">
          @foreach($categories as $category)
            <div id="category" class="col-12 justify-content-center d-flex align-items-center col-lg-1 ">
              <a class='nav-link nav-link-accordion  link-category text-white'  data-aos="fade-right" data-aos-duration="1000" href="{{route('announcement.index', [
                $category->name,
                $category->id,
                ]
                )}}">
                {{$category->name}}
              </a>
            </div>
          @endforeach
        </div>

      </div>
    </div>
  </div>
  
</div>