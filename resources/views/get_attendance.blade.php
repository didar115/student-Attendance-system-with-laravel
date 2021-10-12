@extends('layouts.app')
@section('content')
<head>
  <script src=
  "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
      </script>

     
</head>
  <body>
  <div class="bg-success text-center py-2">
      <h2>Student Attendance</h2>
    </div>




    <form action="{{url('/submit-attendance')}}" method="POST">

    @csrf
    <div class='d-flex justify-content-center pt-2'>
      <span class='text-danger'>Date:</span>
    <input type="date" name="date"  class='ms-3 rounded-1' id='date'>
    </div>



    <div class="container w-50 mt-3">
        {{-- <a href="{{url('/add-data')}}" class="btn btn-primary my-4">Add data</a> --}}
            @if(Session::has('mesg'))
       <p class="alert alert-success">{{Session::get('mesg')}}</p>
       @endif
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
          <tbody>
            @foreach ($attendance as $key=>$data )
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->name}}</td>
                <input type="hidden" name="roll_number[]" value="{{$data->id}}">
                <input type="hidden" name="name[]" value="{{$data->name}}">
                <td>
                      <!-- check box selection  -->
                        <div class='d-flex ms-5'>
                          {{-- <div class="form-check">
                              <input class="form-check-input" id="checkbox2" type="checkbox" value="1" name="action[]" id="defaultCheck1">
                              <label class="form-check-label" for="defaultCheck1">
                                present
                              </label>
                              </div> --}}
                              


                              <div class="form-check">
                              <input  type="hidden" name="action[{{$key}}]" value="0"> 
                              <input class="form-check-input" type="checkbox" name="action[{{$key}}]" value="1" >
                              <label class="form-check-label" for="defaultCheck1">
                                present
                              </label>
                              </div> 

                              
{{--                                 
                                <label class="form-check-label ms-2" for="defaultCheck1">
                                present
                              </label> --}}
                            
                        </div>
                        <!-- end check box  -->
                </td>
            </tr>
            @endforeach
          </tbody>
</table>
<button class='btn btn-primary' type='submit' value="submit">submit</button>
      </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
    document.getElementById('date').valueAsDate = new Date();
    </script>

  </body>
</html>

@endsection
