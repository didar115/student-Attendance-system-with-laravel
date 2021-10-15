{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app3')
@extends('layouts.app2')




@section('content')
<div class="d-flex ">
    <h1 class=" bg-success w-50 p-4 rounded-3 text-white text-center me-4"> {{$count_student}} <div>Students </div> </h1>
    <h1 class=" bg-primary w-50 p-4 rounded-3 text-white text-center"> {{$count_admin}} <div>Teachers </div> </h1>
    

</div>


  </head>
  <body>
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

@endsection