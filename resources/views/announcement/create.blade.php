<x-layout>
    
  <!-- DIV HEADER-->
  <div class="container-fluid align-items-center sfondo-create">
    <div class="row d-flex align-items-center justify-content-center "> 
      <h1 class="display-3 text-center">
        {{__('ui.inserisci_annuncio')}}
      </h1>  
    </div>
  </div>
    
  <!-- DIV FORM -->
  <div class="container"></div>
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-12 col-lg-10 my-5 p-5 shadow">
        <form method="POST" action="{{route('announcement.store')}}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">
          
          <!--  NAME -->
          <div class="row">    
            <!-- COLONNA SINISTRA -->
            <div class="col-12 col-md-6 d-flex flex-column justify-content-between">
              <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">{{__('ui.titolo')}}</label>
                  <input type="text" name="title" class="form-control @error('title') is invalid @enderror" id="exampleInputtitle" aria-describedby="emailHelp" value="{{old('title')}}">
                    @error('title')
                  <div class="ps-2 pe-0 pb-0 pt-0 small fst-italic text-danger">{{$message}}</div>
                    @enderror
              </div>
              <!--  PREZZO -->
              <div class="mb-3">
                <label for="exampleInputPrice" class="form-label">{{__('ui.prezzo')}}</label>
                <input type="text" name="price" class="form-control @error('price') is invalid @enderror" id="exampleInputPrice" value="{{old('price')}}">
                  @error('price')
                    <div class="ps-2 pe-0 pb-0 pt-0 small fst-italic text-danger">{{$message}}</div>
                  @enderror
              </div>
              <!--  CATEGORIE -->
              <div class="mb-3">
                <label for="exampleInputCategories" class="form-label">{{__('ui.categorie_disponibili')}} </label>
                <select name="categories"  class="form-control">
                  @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <!-- COLONNA DESTRA -->
            <div class="col-12 col-md-6">
              <!-- INSERIMENTO IMMAGINE -->
              <div class="mb-3">
                <label for="exampleInputDescription" class="form-label">
                {{__('ui.inserisci_descrizione')}}
                </label>
                <textarea class="form-control @error('description') is invalid @enderror" name="description" cols="30" rows="3">
                {{old('description')}}
                </textarea>
                @error('description')
                <div class="ps-2 pe-0 pb-0 pt-0 small fst-italic text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleInputImage" class="form-label">{{__('ui.immagini')}}</label>
                <!-- <input type="file" name="image" class="form-control @error('price') is invalid @enderror" id="exampleInputImage" value="{{old('image')}}"> -->
                <div class="dropzone mt-3" id="drophere">
                </div>
                @error('image')
                  <div class="ps-2 pe-0 pb-0 pt-0 small fst-italic text-danger">{{$message}}</div>
                @enderror
              </div>  
            </div>

          </div>

          <!-- DIV BUTTON-->
          <div class="row justify-content-center">
            <button type="submit" class="btn-custom text-white d-flex justify-content-center align-items-center mt-3 mx-5"> 
              {{__('ui.inserisci_annuncio')}}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
</x-layout> 