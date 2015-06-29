@extends('contact.master')

@section('htmlheader_title')
    Sender ID
@endsection
@section('contentheader_title')
    Sender ID Dashboard
@endsection
@section('contentheader_description')
Sender ID Status
@endsection
@section('main-content')
<div>
<div class="row">
		<div class="col-md-12">
                    
                    @if(!empty($senderidmsg))
                    <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h6><i class="icon fa fa-star"></i> Note!!</h6>

                                    <ul>{{isset($senderidmsg) ? $senderidmsg : "Error"}}</ul>

                     </div>
                    @endif
                    
                    @if($senderids->count() > 0)
                 
                    <div class="col-md-3">	
                        <div class="info-box">
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <a href="#" >
                        <span class="info-box-icon bg-blue"><i class="fa fa-group"></i></span>
                        </a>
                                <div class="info-box-content">
                                <span class="info-box-text" style="text-transform:none">Sender Ids</span>
                                <span class="info-box-number">{{$senderids->count()}}</span>
                                </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>	<!-- columns -->
                    @elseif($senderids->count()==0)
                    <div class="box-footer">
                    <span class="info-box-text" style="text-transform:none">You Don't Have a Sender ID, Why don't request one now :-)</span>    
                    <a class="btn btn-block center-block bg-blue-gradient" href="{{URL::action('SenderIdController@create')}}">Request New</a>
                    </div>
                    @endif
                </div>
                <div class="col-md-12">
                  <table id="contactdata" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Requested ID</th>
                <th>Approval Status</th>
                <th>Note / Remarks</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Requested ID</th>
                <th>Approval Status</th>
                <th>Note / Remarks</th>
            </tr>
        </tfoot>
 
        <tbody>
            @foreach ($senderids as $senderid)
            <tr>
                <td>{{$senderid->senderid_name}}</td>
                <td>{{$senderid->senderid_status}}</td>
                <td>{{$senderid->senderid_note}}</td>
            </tr>
            @endforeach
        
        </tbody>
    </table>
                </div>
	</div>	
</div>
@endsection
