@extends('contact.master')

@section('htmlheader_title')
    Reminders
@endsection
@section('contentheader_title')
    Reminder Dashboard
@endsection
@section('contentheader_description')
List of All Reminders 
@endsection
@section('main-content')
<div>
<div class="row">
		<div class="col-md-12">
                    <div class="col-md-3">	
                        <div class="info-box">
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <a href="#" >
                        <span class="info-box-icon bg-blue"><i class="fa fa-group"></i></span>
                        </a>
                                <div class="info-box-content">
                                <span class="info-box-text" style="text-transform:none">Total Reminder(s)</span>
                                <span class="info-box-number">{{$reminders->count()}}</span>
                                </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
			</div>	<!-- columns -->
                        
                        <div class="col-md-3">	
				<div class="info-box">
				<!-- Apply any bg-* class to to the icon to color it -->
				<a href="#" >
				<span class="info-box-icon bg-blue"><i class="fa fa-group"></i></span>
				</a>
					<div class="info-box-content">
                                            <span class="info-box-text" style="text-transform:none">Birthday Reminders</span>
					<span class="info-box-number">{{$reminders->where('set','=','birthday')->count()}}</span>
					</div><!-- /.info-box-content -->
				</div><!-- /.info-box -->
			</div>	<!-- columns -->
                        <div class="col-md-3">	
				<div class="info-box">
				<!-- Apply any bg-* class to to the icon to color it -->
				<a href="#" >
				<span class="info-box-icon bg-blue"><i class="fa fa-group"></i></span>
				</a>
					<div class="info-box-content">
                                            <span class="info-box-text" style="text-transform:none">Anniversary Reminders</span>
					<span class="info-box-number">{{$reminders->where('set','=','anniversary')->count()}}</span>
					</div><!-- /.info-box-content -->
				</div><!-- /.info-box -->
			</div>	<!-- columns -->
                        <div class="col-md-3">	
				<div class="info-box">
				<!-- Apply any bg-* class to to the icon to color it -->
				<a href="#" >
				<span class="info-box-icon bg-blue"><i class="fa fa-group"></i></span>
				</a>
					<div class="info-box-content">
                                            <span class="info-box-text" style="text-transform:none">Special Days' Reminders</span>
					<span class="info-box-number">{{$reminders->where('set','=','specialday')->count()}}</span>
					</div><!-- /.info-box-content -->
				</div><!-- /.info-box -->
			</div>	<!-- columns -->
		
		
		</div>
                <div class="col-md-12">
                  <table id="contactdata" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Reminder Set</th>
                <th>Reminder Type</th>
                <th>Reminder To</th>
                <th>Reminder Date</th>
                <th>Reminder Message</th>
                <th>Reminder Status</th>
                <th>Action</th>
            </tr>
        </thead>
 
        <tfoot>
             <tr>
                <th>Reminder Set</th>
                <th>Reminder Type</th>
                <th>Reminder To</th>
                <th>Reminder Date</th>
                <th>Reminder Message</th>
                <th>Reminder Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
 
        <tbody>
            @foreach ($reminders as $reminder)
            <tr>
                <td>{{$reminder->reminder_set}}</td>
                <td>{{$reminder->reminder_type}}</td>
                <td>{{$reminder->reminder_to}}</td>
                <td>{{$reminder->reminder_date}}</td>
                <td>{{$reminder->reminder_msg}}</td>
                <td>{{$reminder->reminder_status}}</td>
                <td>
                    <a href="#">Edit</a>
                </td>
              
            </tr>
            @endforeach
        
        </tbody>
    </table>
                </div>
	</div>	
</div>
@endsection
