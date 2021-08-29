@extends('layouts.app')
@section('content')

<style>
    .bg-blue {
    background: #ffffff!important;
}
.btn--green {
    background: #2b378c!important;
}

select {
    width: 499px!important;
    border: none!important;
    color: darkolivegreen;
}

</style>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
  
                <div class="card-body">
                    <h3 style="color: #2b378c;" class="title">Update employee : {{$mains->fname}} {{$mains->lname}} </h3>

                    @foreach ($errors->all() as $error )
                    <div class="flash-message">
                    <p class="alert alert-danger"> {{$error}}</p>
</div>

  @endforeach


                    <form method="post" action="{{route('emp.update',$mains->id)}}">
                    {{ csrf_field() }}
                     @method('PUT')

                        <div class="input-group">
                            <input class="input--style-1" type="text" value="{{$mains->fname}}" placeholder="First name" name="fname">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" value="{{$mains->lname}}" placeholder=" Last Name" name="lname">
                        </div>


                    
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="company">
                                        
                                           
                                            
                                            <option value="{{$mains->company}}">{{$mains->company}}</option>
                                            @foreach ($mains2 as $main )
                                           
                                            <option  selected="selected">{{$main->name}}</option>
                                            @endforeach
                                         
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                           



                        <div class="input-group">
                            <input class="input--style-1" type="email" value="{{$mains->email}}" placeholder="email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" value="{{$mains->phone}}" placeholder="phone " name="phone">
                        </div>
                     
    
                
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Update</button>
                           <a href="/main"> <button class="btn btn--radius btn--green" type="submit">Back</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection