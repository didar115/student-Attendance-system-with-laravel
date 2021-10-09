
@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
      <div class="row">
        <div class="col-2">
          <h1>hi</h1>

        </div>
        <div class="col-10 ">
        <a href="{{url('/home')}}" class="btn btn-primary my-4">show data</a>

        <form action="{{url('/update-data/'.$editData->id)}}" method="POST" class="w-75">
          @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value={{$editData->name}} placeholder="Enter name">
                @error('name')
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" value={{$editData->email}} placeholder="Enter email">
                  @error('email')
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="number" class="form-control" name="phone" value={{$editData->phone}} placeholder="Enter phone">
                  @error('phone')
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>  
            <input type="submit" class="btn btn-primary my-3" value="submit">
        </form>
        
    </div>


        </div>
      </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection