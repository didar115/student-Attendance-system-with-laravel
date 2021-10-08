
@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
      <div class="row">
        <div class="col-2">
          <h1>hi</h1>

        </div>
        <div class="col-10 ">
        <a href="{{url('/home')}}" class="btn btn-primary my-4">show data</a>
        <form action="" method="POST" class="w-75">
          @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="number" class="form-control" name="phone" placeholder="Enter phone">
            </div>  
            <input type="submit" class="btn btn-primary my-3" value="submit">
        </form>
        
    </div>


        </div>
      </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection