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
       {!! Form::open(array('action' => 'SenderIdController@store','method'=>'post','name'=>'create_senderid','id'=>'create_senderid','role'=>'form')) !!}
        <div class="box-body">
          
            
            <div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Request A Sender ID Here</h3>
    <div class="box-tools pull-right">
     <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
      
            <div class="form-group col-lg-6">
                <label for="senderid_name">SENDER ID</label>
                <input type="text" class="form-control" id="senderid_name" name="senderid_name" value="{{Input::old('senderid_name')}}" placeholder="Enter 6 Character Sender ID" required="1">
                <p class="errors">{{$errors->first('senderid_name')}}</p>
                <p class="help-block">Do not Use Special Characters or Space, Else Request will be rejected</p>
            </div>
           
           
  </div>
 
  
</div><!-- /.box -->

        </div><!-- /.box-body -->
      
        <div class="box-footer">
            <button type="submit" name="submit" onsubmit="" class="btn btn-block center-block bg-blue-gradient">Request Now</button>
        </div>
        {!!Form::close()!!}
</div>	  
@endsection
