@extends('app')

@section('htmlheader_title')
    Contacts
@endsection
@section('contentheader_title')
    Contact Dashboard
@endsection
@section('contentheader_description')
Add a Contact (Includes an Employee Contact with Spose & Two Children)
@endsection
@section('main-content')
<div>
<div class="row">
    <div class="box-body"><p class="text-bold">Add A New Contact</p></div>
    
 
    @if(!empty($errors->first()))
    <div class="alert alert-danger alert-dismissable">
        <div class="" style="display:none" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fa fa-ban"></i> Ohh Ho!</h6>
                    <p>You need to submit data in correct format. Please check errors and resolve before resubmission</p>
            </div>    
     {{$errors->first()}}
                 
     </div>
    @endif
    @if(!empty($createcontact_msg))
    <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fa fa-ban"></i> Note!!</h6>
                    
                    <ul>{{isset($createcontact_msg) ? $createcontact_msg : "Error"}}</ul>
                   
     </div>
    @endif
 <!--   <form role="form" name="create_user" method="post" action="{{URL::action('UserController@store')}}"> -->
       {!! Form::open(array('action' => 'ContactController@store','method'=>'post','name'=>'create_contact','id'=>'create_contact','role'=>'form')) !!}
        <div class="box-body">
          
            
            <div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Contact Details</h3>
    <div class="box-tools pull-right">
     <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
      <h5>Employee Details</h5>
            <div class="form-group col-lg-3">
                <label for="emp_fullname">Employee's Full Name</label>
                <input type="text" class="form-control" id="emp_fullname" name="emp_fullname" value="{{Input::old('emp_fullname')}}" placeholder="Enter Full Name" required="1">
                <p class="errors">{{$errors->first('emp_fullname')}}</p>
            </div>
           
            <div class="form-group col-lg-3">
                <label for="emp_email">Employee's Email Address</label>
                <input type="email" class="form-control" id="emp_email" name="emp_email" value="{{Input::old('emp_email')}}" placeholder="Enter Employee Email" required="1">
                <p class="errors">{{$errors->first('contact_email')}}</p>
            </div>
            <div class="form-group col-lg-3">
                <label for="emp_mobile">Employee's Mobile Number</label>
                <input type="number" class="form-control" id="emp_mobile" name="emp_mobile" value="{{Input::old('emp_mobile')}}" placeholder="10 Digit Mobile Number" required="1">
                <p class="errors">{{$errors->first('emp_mobile')}}</p>
            </div>
            <div class="form-group col-lg-3">
                <label for="emp_dob">Employee's Date Of Birth</label>
                 <input type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy"  class="form-control" id="emp_dob" name="emp_dob" value="{{Input::old('emp_dob')}}" required="1">
                <p class="errors">{{$errors->first('contact_dob')}}</p>
            </div>
            <div class="form-group col-lg-3">
                <label for="emp_relship">Married ? Or in A Relationship</label>
                <select name="emp_relship" id="emp_relship" class="form-control">
                    <option value="no" selected>Unmarried</option>
                <option value="yes" >Married</option>
                </select>
            <!--    <input type="checkbox" class="checkbox box-tools" id="emp_relship" name="emp_relship" value="yes"/>
               <p class="help-block">Please Uncheck and Check Again if Spouse Form is not displayed</p>
               <p class="errors">{{$errors->first('emp_relship')}}</p>
            -->
            </div>
           
  </div>
  <div class="box-body" id="is_married_yes">
         <h5>Spouse Details</h5>
        
            <div class="form-group col-lg-2">
                <label for="spouse_fullname">Spouse's Full Name</label>
                <input type="text" class="form-control" id="spouse_fullname" name="spouse_fullname" value="{{Input::old('spouse_fullname')}}" placeholder="Enter Spouse's Firts Name">
                <p class="errors">{{$errors->first('spouse_fullname')}}</p>
            </div>
            <div class="form-group col-lg-2" >
                <label for="spouse_email">Spouse's Email Address</label>
                <input type="email" class="form-control" id="spouse_email" name="spouse_email" value="{{Input::old('spouse_email')}}" placeholder="Enter Spouse's Email">
                <p class="help-block">If Left Blank, Mail will Go to Employee's Email</p>
                <p class="errors">{{$errors->first('spouse_email')}}</p>
            </div>
            <div class="form-group col-lg-2">
                <label for="spouse_mobile">Spouse's Mobile Number</label>
                <input type="number" class="form-control" id="spouse_mobile" name="spouse_mobile" value="{{Input::old('spouse_mobile')}}" placeholder="10 Digit Mobile Number">
                <p class="help-block">If Left Blank, SMS will Go to Employee's Number</p>
                <p class="errors">{{$errors->first('spouse_mobile')}}</p>
            </div>
            <div class="form-group col-lg-2">
                <label for="spouse_dob">Spouse's Date Of Birth</label>
                <input type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy" class="form-control" id="spouse_dob" name="spouse_dob" value="{{Input::old('spouse_dob')}}">
                <p class="errors">{{$errors->first('contact_dob')}}</p>
            </div>
            <div class="form-group col-lg-2">
                <label for="anniversary">Anniversary</label>
                <input type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy" class="form-control" id="anniversary" name="anniversary" value="{{Input::old('anniversary')}}" >
                <p class="errors">{{$errors->first('anniversary')}}</p>
            </div>
            <div class="form-group col-lg-2">
                <label for="have_children">Have Children</label>
                <select name="have_children" id="have_children" class="form-control">
                    <option value="no" selected>No</option>
                <option value="yes">Yes</option>
                </select>
            </div>
  </div>
  <div class="box-body" id="have_children_yes">
      <h5>Children Details</h5>
      <div class="col-lg-12">
            <div class="form-group col-lg-3">
                <label for="fchild_name">First Child Full Name</label>
                <input type="text" class="form-control" id="fchild_name" name="fchild_name" value="{{Input::old('fchild_name')}}" placeholder="Enter Firts Child Name">
                <p class="errors">{{$errors->first('fchild_name')}}</p>
            </div>
            <div class="form-group col-lg-3">
                <label for="fchild_email">First Child Email</label>
                <input type="text" class="form-control" id="fchild_email" name="fchild_email" value="{{Input::old('fchild_email')}}" placeholder="Enter Firts Child Email">
                <p class="errors">{{$errors->first('fchild_email')}}</p>
            </div>
            <div class="form-group col-lg-3">
                <label for="fchild_mobile">First Child Mobile</label>
                <input type="text" class="form-control" id="fchild_mobile" name="fchild_mobile" value="{{Input::old('fchild_mobile')}}" placeholder="Enter Firts Child Mobile">
                <p class="errors">{{$errors->first('fchild_mobile')}}</p>
            </div>
            <div class="form-group col-lg-3">
                <label for="fchild_dob">First Child Birthday</label>
                 <input type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy" class="form-control" id="fchild_dob" name="fchild_dob" value="{{Input::old('fchild_dob')}}" >
                <p class="errors">{{$errors->first('fchild_dob')}}</p>
            </div>
          </div>
      <div class="col-lg-12">
            <div class="form-group col-lg-3">
                <label for="schild_name">Second Child Full Name</label>
                <input type="text" class="form-control" id="schild_name" name="schild_name" value="{{Input::old('schild_name')}}" placeholder="Enter Second Child Name">
                <p class="errors">{{$errors->first('schild_name')}}</p>
            </div>
      <div class="form-group col-lg-3">
                <label for="schild_email">Second Child Email</label>
                <input type="text" class="form-control" id="schild_email" name="schild_email" value="{{Input::old('schild_email')}}" placeholder="Enter Second Child Email">
                <p class="errors">{{$errors->first('fchild_email')}}</p>
            </div>
            <div class="form-group col-lg-3">
                <label for="schild_mobile">Second Child Mobile</label>
                <input type="text" class="form-control" id="fchild_mobile" name="schild_mobile" value="{{Input::old('schild_mobile')}}" placeholder="Enter Firts Child Mobile">
                <p class="errors">{{$errors->first('schild_mobile')}}</p>
            </div>
            <div class="form-group col-lg-3 input-append date">
                <label for="schild_dob">Second Child Birthday</label>
               <!-- <input type="date" class="form-control" id="schild_dob" name="schild_dob" value="{{Input::old('schild_dob')}}" >
               -->
               <input type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy" class="form-control" id="schild_dob" name="schild_dob" value="{{Input::old('schild_dob')}}">
                <span class="add-on"><i class="icon-th"></i></span>
                <p class="errors" style="color: red">{{$errors->first('schild_dob')}}</p>
            </div>
        </div>
  </div><!-- /.box-body -->
</div><!-- /.box -->

        </div><!-- /.box-body -->
      
        <div class="box-footer">
            <button type="submit" name="submit" onsubmit="" class="btn btn-block center-block bg-blue-gradient">Add Contact</button>
        </div>
        {!!Form::close()!!}
</div>	  
@endsection
