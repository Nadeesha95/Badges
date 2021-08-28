@extends('layouts.app')
@section('content')

<style>
    .bg-blue {
    background: #ffffff!important;
}
.btn--green {
    background: #2b378c!important;
}


</style>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
  
                <div class="card-body">
                    <h3 style="color: #2b378c;" class="title">Add New Company</h3>

                    @foreach ($errors->all() as $error )
                    <div class="flash-message">
                    <p class="alert alert-danger"> {{$error}}</p>
</div>

  @endforeach

  <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div>


                    <form method="post" action="{{route('main.store')}}">
    {{ csrf_field() }}
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Name" name="name">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="website" placeholder="Website(URL) " name="website">
                        </div>
                        <div class="input--style-1">
                        <input type="file" id="logo" name="logo" accept="image/png" enctype="multipart/form-data">
                        </div>
    
                
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection