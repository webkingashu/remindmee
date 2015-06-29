@extends('app')

@section('htmlheader_title')
    Create User
@endsection
@section('contentheader_title')
    Dashboard
@endsection
@section('contentheader_description')
@if(Auth::user()->group_id == 1)
Administrator Panel
@elseif (Auth::user()->group_id==3)
Corporate Panel
@endif
@endsection
@section('main-content')
<div class="container">
@if(Auth::user()->ID==1)
<div class="row">
    <div class="box-body"><p class="text-bold">Add New User</p></div>
    
 
    @if(!empty($errors->first()))
    <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fa fa-ban"></i> Ohh Ho!</h6>
                    <p>You need to submit data in correct format. Please check errors and resolve before resubmission</p>
                   
     </div>
    @endif
    @if(!empty($createuser_msg)&& !empty($createprofile_msg))
    <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fa fa-ban"></i> Success!!</h6>
                    <ul>{{$createuser_msg}}</ul>
                    <ul>{{$createprofile_msg}}</ul>
                   
     </div>
    @endif
 <!--   <form role="form" name="create_user" method="post" action="{{URL::action('UserController@store')}}"> -->
       {!! Form::open(array('action' => 'UserController@store','method'=>'post','name'=>'create_user','role'=>'form')) !!}
        <div class="box-body col-lg-12">
          
            
            <div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">User Details</h3>
    <div class="box-tools pull-right">
     <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
     <div class="form-group col-lg-3">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{Input::old('first_name')}}" placeholder="Enter Firts Name" required="1">
                <p class="errors">{{$errors->first('first_name')}}</p>
            </div>
            <div class="form-group col-lg-3">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{Input::old('last_name')}}" placeholder="Enter Last Name" required="1">
                <p class="errors">{{$errors->first('last_name')}}</p>
            </div>
            <div class="form-group col-lg-3">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{Input::old('email')}}" placeholder="Enter email" required="1">
                <p class="errors">{{$errors->first('email')}}</p>
            </div>
            <div class="form-group col-lg-3">
                <label for="mobile">Mobile Number</label>
                <input type="number" class="form-control" id="mobile" name="mobile" value="{{Input::old('mobile')}}" placeholder="10 Digit Mobile Number" required="1">
                 <p class="errors">{{$errors->first('mobile')}}</p>
            </div>
            <div class="form-group col-lg-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password"  placeholder="Password Here" required="1">
                <p class="errors">{{$errors->first('password')}}</p>
            </div>
            <div class="form-group col-lg-6">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password Here" required="1">
                <p class="errors">{{$errors->first('password_confirmation')}}</p>
            </div>
             <div class="form-group col-lg-6">
                <label for="active">Status</label>
                <select class="form-control" id="active" value="{{Input::old('active')}}" name="active" required="1">
                  <option value="">Select Status</option>  
                  <option value="1">Active</option>
                  <option value="0">Not Active</option>
                </select> 
                <p class="errors">{{$errors->first('active')}}</p>
            </div>
        <div class="form-group col-lg-6">
                <label for="group_id">User Group</label>
                <select class="form-control" id="group_id" value="{{Input::old('group_id')}}" name="group_id" required="1">
                  <option value="">Select Group</option>  
                  <option value="3">Corporate Customer</option>
                    <option value="1">Admin User</option>
                </select> 
                <p class="errors">{{$errors->first('group_id')}}</p>
            </div>
  </div><!-- /.box-body -->
</div><!-- /.box -->

        </div><!-- /.box-body -->
      
        <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-block center-block bg-blue-gradient">Create User</button>
        </div>
        {!!Form::close()!!}
</div>	  
		  
@endif	

	
</div>
@endsection
