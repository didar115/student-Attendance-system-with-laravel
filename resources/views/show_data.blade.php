@extends('layouts.app')

@section('content')
  </head>
  <body>
    <div class="bg-success text-center py-1 ">
      <h2>All Student</h2>
    </div>

    <div class="container w-50">
        <a href="{{url('/add-data')}}" class="btn btn-primary my-4">Add student</a>
            @if(Session::has('mesg'))
       <p class="alert alert-success">{{Session::get('mesg')}}</p>
       @endif
        <table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($showData as $key=>$data )
    <tr>
      {{-- <th scope="row">{{$key+1}}</th> --}}
      <td>{{$data->id}}</td>
      <td>{{$data->name}}</td>
      <td>{{$data->email}}</td>
      <td>{{$data->phone}}</td>
      <td>
        <a href="{{url('/edit-data/'.$data->id)}}" class="btn btn-success">Edit</a>
        <a href="{{url('/delete-data/'.$data->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

@endsection
