<x-layout>
  
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="container-fluid bg-login">

        <h1 class="display-1 text-center">
            {{__('ui.accedi')}}
        </h1>
        <div class="row justify-content-start  align-items-center"> 
            <div class=" col-8 col-md-5 ms-5 mt-2 d-flex flex-column  align-items-center ">  
                
                <form class="shadow d-flex flex-column pt-3 align-items-center" method="POST" action="{{route('login')}}">
                    @csrf 
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">{{__('ui.indirizzo_email')}} </label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">{{__('ui.safe_email')}}</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">{{__('ui.password')}}</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                        <button type="submit" class="btn-custom text-white d-flex justify-content-center align-items-center mt-3 mx-5">{{__('ui.accedi')}}</button>
                    
                    <div class="registrati">
                        <a href="{{route('register')}}"> {{__('ui.non_account')}}
                        </a>
                    </div>
                </form>
                
            </div>        
        </div>

    </div>  
    
</x-layout> 