@extends('app')

@section('htmlheader_title')
    Edit Account Details
@endsection
@section('contentheader_title')
    Edit Account Details 
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

<div class="row">
    
    
   <!-- @foreach ($errors->all() as $error)
    
    <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fa fa-ban"></i> Ohh Ho!</h6>
                    <p>
                   {{$error}} 
     </div>
    
    @endforeach
    -->
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
       {!! Form::open(array('action' => 'ProfileController@store','method'=>'post','name'=>'update_profile','role'=>'form')) !!}
        <div class="box-body col-lg-12">
          
            
            <div class="box box-default">
  <div class="box-header with-border">
    
    <div class="box-tools pull-right">
     <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
     <div class="form-group col-lg-3">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{$profile->user->first_name}}" placeholder="Enter Firts Name" required="1">
                <p class="errors">{{$errors->first('first_name')}}</p>
            </div>
            <div class="form-group col-lg-3">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{$profile->user->last_name}}" placeholder="Enter Last Name" required="1">
                <p class="errors">{{$errors->first('last_name')}}</p>
            </div>
            <div class="form-group col-lg-3">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$profile->user->email}}" placeholder="Enter email" required="1" readonly="1">
                <p class="errors">{{$errors->first('email')}}</p>
            </div>
            <div class="form-group col-lg-3">
                <label for="mobile">Mobile Number</label>
                <input type="number" class="form-control" id="mobile" name="mobile" value="{{$profile->mobile_no}}" placeholder="10 Digit Mobile Number" required="1">
                 <p class="errors">{{$errors->first('mobile')}}</p>
            </div>
             <div class="form-group col-lg-3">
                          <label for="telephone_no">Telephone No</label>
                          <input type="tel" class="form-control" id="telephone_no" name="telephone_no" value="{{$profile->telephone_no}}">
                           <p class="errors">{{$errors->first('telephone_no')}}</p>
             </div> 
            <div class="form-group col-lg-3">
                      <label for="date_of_birth">Date of Birth</label>
                      <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{$profile->date_of_birth}}">
                       <p class="errors">{{$errors->first('mobile')}}</p>
            </div>
            <div class="form-group col-lg-3">
                    <label for="company_industry">Company Industry</label>
                    <input type="text" class="form-control" id="company_industry" name="company_industry" value="{{$profile->company_industry}}">
                     <p class="errors">{{$errors->first('company_industry')}}</p>
            </div>
            <div class="form-group col-lg-3">
                          <label for="website">Website </label>
                          <input type="url" class="form-control" id="website" name="website" value="{{$profile->website}}" placeholder="http://reemindme.com">
                           <p class="errors">{{$errors->first('telephone_no')}}</p>
             </div> 
            <div class="form-group col-lg-3">
                          <label for="address">Address</label>
                          <input type="text" class="form-control" id="address" name="address" value="{{$profile->address}}">
                           <p class="errors">{{$errors->first('address')}}</p>
             </div>
            <div class="form-group col-lg-3">
                          <label for="city">City</label>
                          <input type="text" class="form-control" id="city" name="city" value="{{$profile->city}}">
                           <p class="errors">{{$errors->first('city')}}</p>
             </div> 
            <div class="form-group col-lg-3">
                          <label for="pincode">Pincode</label>
                          <input type="number" class="form-control" id="pincode" name="pincode" value="{{$profile->pincode}}">
                           <p class="errors">{{$errors->first('pincode')}}</p>
             </div> 
            <div class="form-group col-lg-3">
                          <label for="pincode">State</label>
                          <input type="text" class="form-control" id="state" name="state" value="{{$profile->state}}">
                           <p class="errors">{{$errors->first('state')}}</p>
             </div> 
            <div class="form-group col-lg-3">
                          <label for="country">Country</label>
                          <input type="text" class="form-control" id="state" name="country" value="{{$profile->country}}">
                           <p class="errors">{{$errors->first('country')}}</p>
             </div> 
           
 
           @if(Auth::user()->group_id ==1)
           
           <div class="col-lg-12">
               <h5 class="box-body bg-blue-gradient">Only Admin Can Change Below Settings : Proceed Carefully | Dont Get yourself Locked Out</h5>
             <div class="form-group col-lg-6">
                 
                <label for="active">Status</label>
              {!!Form::select('active',
                              array('0' => 'Not Active', '1' => 'Active'),
                              $profile->user->active,
                              array('class'=>'form-control','id'=>'active')
              )!!}
 
                <p class="errors">{{$errors->first('active')}}</p>
            </div>
        <div class="form-group col-lg-6">
                <label for="group_id">User Group</label>
                
            {!!Form::select('group_id',
                         array('1' => 'Admin User', '3' => 'Corporate User'),
                         $profile->user->group_id,
                         array('class'=>'form-control','id'=>'group_id')
            )!!}
                
                <p class="errors">{{$errors->first('group_id')}}</p>
            </div>
               </div>
           @endif
  </div><!-- /.box-body -->
</div><!-- /.box -->

        </div><!-- /.box-body -->
        </div>
        <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-block center-block bg-blue-gradient">Update Profile</button>
        </div>
    </form>
</div>	  
		  


	
</div>
@endsection
