@extends('layouts.app')
@section('content')

<style>
    .bg-blue {
    background: #ffffff!important;
}
.btn--green {
    background: #2b378c!important;
}
.err{
    background: #c75555;
    color: #fffffe;
    font-size: 19px;
    margin-top: 2px;
}

</style>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
  
                <div class="card-body">
                    <h3 style="color: #2b378c;" class="title">Add New Company</h3>

                    @foreach ($errors->all() as $error )
  <div class="err" role="alert">
  {{$error}}
</div>

  @endforeach


                    <form method="post" action="#">
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
                        <input type="file" id="avatar" name="avatar"accept="image/png, image/jpeg">
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