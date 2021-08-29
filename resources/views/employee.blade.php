@extends('layouts.app')
@section('content')

<div class="container" style="width:900px">

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div>
<a href="/addemployee"><button type="button" class="btn  btn-success btn-sm " style="margin-bottom: 13px;">Add new employee</button></a>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">first name</th>
      <th scope="col">lastname</th>
      <th scope="col">company</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($mains as $main )
    <tr>
      <th scope="row">{{$main->id}}</th>
      <td>{{$main->fname}} </td>
      <td>{{$main->lname}}</td>
      <td>{{$main->company}}</td>
      <td>{{$main->email}}</td>
      <td>{{$main->phone}}</td>
      <td>
      <a  href="{{route('emp.edit',$main->id)}}"><i class="fas fa-edit"></i></a>
      <a style="margin-left: 14px;color: red;"href="{{route('emp.show', $main->id)}}" class="delete" data-confirm="Are you sure to delete this item?"><i class="fas fa-trash-alt"></i></a>
      </td>
    </tr>
    @endforeach 
  </tbody>
</table>

{{ $mains->onEachSide(5)->links() }}

</div>


<script>
  var deleteLinks = document.querySelectorAll('.delete');

for (var i = 0; i < deleteLinks.length; i++) {
  deleteLinks[i].addEventListener('click', function(event) {
      event.preventDefault();

      var choice = confirm(this.getAttribute('data-confirm'));

      if (choice) {
        window.location.href = this.getAttribute('href');
      }
  });
}
</script>




@endsection