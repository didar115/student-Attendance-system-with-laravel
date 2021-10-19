@extends('layouts.app')
@section('content')
<head>
  <script src=
  "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
      </script>
@section('style')
      <style>
         .isChecked {
            background-color: #91d7fa;
          }
          table {
            width: 100%;
            border-collapse: collapse;
          }
          tr {
            background-color: #fafafa;
          }
          /* click-through element */
          .check {
            pointer-events: none;
          }
      </style>
@endsection
     
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



            <div class="container w-75 mt-3 me-5">
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
                              <tr id="tr{{$data->id}}">
                                  <td>{{$data->id}}</td>
                                  <td>{{$data->name}}</td>
                                  <input type="hidden" name="roll_number[]" value="{{$data->id}}">
                                  <input type="hidden" name="name[]" value="{{$data->name}}">
                                  <td>
                                        <!-- check box selection  -->
                                          <div class='d-flex ms-5'>
                                                <div class="form-check">
                                                    <input  type="hidden" name="action[{{$key}}]" value="0"> 
                                                    <input class="form-check-input check" type="checkbox" name="action[{{$key}}]" id="rowColor" value="1" >
                                                    <label class="form-check-label" for="defaultCheck1"> present </label>
                                                </div> 
                                          </div>
                                          <!-- end check box  -->
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                  </table>
                  <button class='btn btn-primary' type='submit' value="submit">submit</button>
              </div>
                    
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
    document.getElementById('date').valueAsDate = new Date();
    // $('#rowColor').click(function () {
    //         // $(this).closest('tr').toggleClass("highlight", this.checked);
    //         // if ($(this).is(":checked")) {
    //         //     // $('#tr').attr('style', 'background-color: lightgrey;');
                
    //         // }
    //     });
    $(document).ready(function() {
      $('tr').click(function() {
        var inp = $(this).find('.check');
        var tr = $(this).closest('tr');
        inp.prop('checked', !inp.is(':checked'))

        tr.toggleClass('isChecked', inp.is(':checked'));
      });

      // do nothing when clicking on checkbox, but bubble up to tr
      $('.check').click(function(e) {
        e.preventDefault();
      })
    })
    </script>

  </body>
</html>

@endsection
