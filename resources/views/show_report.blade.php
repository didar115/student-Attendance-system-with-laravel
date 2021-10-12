
@extends('layouts.app')
@section('content')
  <body>
        <div class="bg-success text-center py-2">
          <h3>Attendance Report</h3>
        </div>


        <div class='d-flex justify-content-center mt-2 bg-white py-3 shadow-md'>

                
              <div>
                    <form action="{{url('/attendance-report')}}" method="GET">
                      @csrf
                        <span class='fw-bold'>Search from</span>
                        <input class='rounded-1' type="date" name='from' required/> 
                        <span class='mx-3 fw-bold'>to</span>
                        <input  class='rounded-1' type="date" name='to' required/>
                        <button class='btn btn-primary' type='submit' value="submit">search</button>
                    </form>
              </div>
            
        </div>
            

        <div class="container w-50 mt-3">
                @if(Session::has('mesg'))
                    @if (isset($fromDate,$toDate))
                    <p class="alert alert-success">{{Session::get('mesg')}} <span class="mx-3"> <span class="mx-3"> {{$fromDate}}</span> to <span class="mx-3"> {{$toDate}} </span></span></p>
                    @endif          
                @endif
       
                @if (isset($report))
                    <table class="table table-bordered table-hover">
                          <thead>
                                <tr>
                                  <th scope="col">Serial</th>
                                  <th scope="col">Id</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Action</th>
                                  <th scope="col">Date</th>
                                </tr>
                          </thead>


                          <tbody>
                              @foreach ($report as $key=>$item )
                              <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->roll_number}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->action}}</td>
                                <td>{{$item->date}}</td>
                              </tr>
                              @endforeach
                          </tbody>
                    </table>
                @endif
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

@endsection




