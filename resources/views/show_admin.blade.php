@extends('layouts.app')

@section('content')
  </head>
  <body>
          <div class="bg-success text-center py-2">
              <h2>Admin</h2>
          </div>
          <div class="container w-75 me-5">
                        <a href="{{url('/show-admin')}}" class="btn btn-primary my-4 rounded-3">Add data</a>
                         @if(Session::has('mesg'))
                        <p class="alert alert-success">{{Session::get('mesg')}}</p>
                        @endif
            <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          {{-- <th scope="col">Phone</th> --}}
                          <th scope="col">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                          @foreach ($showAdmin as $key=>$data )
                          <tr>
                            {{-- <th scope="row">{{$key+1}}</th> --}}
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            {{-- <td>
                              <a href="{{url('/edit-data/'.$data->id)}}" class="btn btn-success">Edit</a>
                              <a href="{{url('/delete-data/'.$data->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
                            </td> --}}
                          </tr>
                          @endforeach
                    </tbody>
             </table>
          </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

@endsection
