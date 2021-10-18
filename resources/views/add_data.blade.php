
@extends('layouts.app')

@section('content')

    <div class="bg-success text-center py-2">
      <h2>Add a new Student</h2>
    </div>
    

    <div class="container w-50 mt-4">
        <a href="{{url('/table')}}" class="btn btn-primary my-4">All student</a>
        {{-- action="{{url('/store-data')}}" method="POST"  --}}

        <form  action="{{url('/store-data')}}" id="contactForm" method="POST"  class="w-75">
                @csrf
                  <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" class="form-control"  type="text" name="name" placeholder="Enter name">
                      @error('name')
                      <span class="text-danger"> {{$message}}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label for="">Email</label>
                      <input type="text" class="form-control" type="email" name="email" placeholder="Enter email">
                        @error('email')
                      <span class="text-danger"> {{$message}}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label for="">Phone</label>
                      <input type="number" class="form-control" type="number" name="phone" placeholder="Enter phone">
                        @error('phone')
                      <span class="text-danger"> {{$message}}</span>
                      @enderror
                  </div>  
                  <input type="submit" id="butsave" class="btn btn-primary my-3" value="submit">
        </form>
    </div>
    <script>
      $(function() {
        $('#contactForm').submit(function(e){
          e.preventDefault();
         
         var data =$(this).serialize();
         var url ='{{url('/store-data')}}'
         console.log(data);
         $.ajax({
           url:url,
           method:'POST',
           data:data,
           success:function(response){

           },
           error:function(error){

            }
         )

        })
      });
      </script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection