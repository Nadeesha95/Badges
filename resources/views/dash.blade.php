@extends('layouts.app')
@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<div class="container-md" style="width: 468px; background: white;">
git testnnnnn
@foreach ($errors->all() as $error )
  <div class="alert alert-danger" role="alert">
  {{$error}}
</div>

  @endforeach



<form method="post" action="{{route('main.store')}}">
      {{ csrf_field() }}


  <div class="form-group">
    <label for="exampleInputEmail1">Product Name</label>
    <input type="text" class="form-control" name="pname" >
    
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Category</label>
    <select class="form-control" name="pcat">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">price</label>
    <input type="text" class="form-control" name="pprice" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">expire date</label>
    <input type="text" class="form-control" id="date" name="date" >
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>





      

</div>

<div class="container">
    
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Email</th>
                <th>Email</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
</body>
   
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('main.index') }}",
        columns: [
            {data: 'id', main: 'id'},
            {data: 'pname', main: 'pname'},
            {data: 'pcat', main: 'pcat'},
            {data: 'pprice', main: 'pprice'},
            {data: 'date', main: 'date'},
            {data: 'action', main: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>





<script>
var utc = new Date().toJSON().slice(0,10).replace(/-/g,'/');
document.getElementById('date').value=utc;
</script>


@endsection