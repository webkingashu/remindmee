@extends('app')

@section('htmlheader_title')
    Sender ID
@endsection
@section('contentheader_title')
    Sender Id Dashboard
@endsection
@section('contentheader_description')
Request a Sender ID(6 Character Unique String)
@endsection
@section('main-content')
<div>
<div class="row">
    
    <div class="box-body">
        @if(!empty($errors->first()))
    <div class="alert alert-danger alert-dismissable">
        
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fa fa-ban"></i> Ohh Ho!</h6>
                    <p>
                        {{$errors->first()}}
                    </p>
              
    
                 
     </div>
    @endif
    </div>
    
   
 <!--   <form role="form" name="create_user" method="post" action="{{URL::action('UserController@store')}}"> -->
       {!! Form::open(array('action' => 'SenderIdController@update','method'=>'PUT','name'=>'update_senderid','id'=>'update_senderid','role'=>'form')) !!}
        <div class="box-body">
          
            
            <div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Update The Sender Id Here</h3>
    <div class="box-tools pull-right">
     <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
      <input type="hidden" name="id" value="{{$senderid_record->id}}" />
            <div class="form-group col-lg-4">
                <label for="senderid_name">SENDER ID</label>
                <input type="text" class="form-control" id="senderid_name" name="senderid_name" value="{{$senderid_record->senderid_name}}" placeholder="Enter 6 Character Sender ID" required="1" readonly="1">
                <p class="errors">{{$errors->first('senderid_name')}}</p>
            </div>
            <div class="form-group col-lg-4">
                <label for="senderid_status">Status</label>
                <select name="senderid_status" id="senderid_status" class="form-control">
                    <option value="pending" selected>Pending</option>
                    <option value="approved" >Approved</option>
                    <option value="rejected" >Rejected</option>
                    <option value="suspended" >Suspended</option>
                    <!--<option value="na">Not Available</option> -->
                </select>
                <p class="errors">{{$errors->first('senderid_status')}}</p>
            </div>
            <div class="form-group col-lg-4">
                <label for="senderid_note">Note (Displayed to User)</label>
                <input type="text" class="form-control" id="senderid_note" name="senderid_note" value="{{$senderid_record->senderid_note}}" placeholder="You May enter Custom Note">
                <p class="errors">{{$errors->first('senderid_note')}}</p>
            </div>
           
           
  </div>
 
  
</div><!-- /.box -->

        </div><!-- /.box-body -->
      
        <div class="box-footer">
            <button type="submit" name="submit" onsubmit="" class="btn btn-block center-block bg-blue-gradient">Update Now</button>
        </div>
        {!!Form::close()!!}
</div>	  
@endsection
