@extends('app')

@section('htmlheader_title')
    Home
@endsection
@section('contentheader_title')
    Dashboard
@endsection
@section('contentheader_description')
Corporate Panel
@endsection
@section('main-content')
<div>
@if($infoSubscribType == 'Corporate')
<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{isset($infoSubscribType) ? $infoSubscribType : "NA" }}</h3>
                  <p>{{isset($infoSubscribTitle) ? $infoSubscribTitle : "NA"}}</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="http://reemindme.com/my-account/" target="_blank" class="small-box-footer">View Order Details<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{isset($infoCorpEmployeeCount) ? $infoCorpEmployeeCount : "NA"}}</h3>
                  <p>{{isset($infoCorpEmployeeTitle) ? $infoCorpEmployeeTitle : "NA"}}</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{URL::action('ContactController@create')}}" class="small-box-footer">Add New<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{isset($infoContactCount) ? $infoContactCount : "NA"}}</h3>
                  <p>{{isset($infoContactTitle) ? $infoContactTitle  : "NA"}}</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{URL::action('ContactController@create')}}" class="small-box-footer">Add New <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{isset($infoReminderCount) ? $infoReminderCount : "NA"}}</h3>
                  <p>{{isset($infoReminderTitle) ? $infoReminderTitle  : "NA"}}</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">View All<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			
          </div>
		  

		  
		  
@endif	
@if($infoContactCount==0)
<div class="row">
    <div class="col-md-12">
        <div class="alert-info bg-info">
           
        </div>
        
        
    </div>
   <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Welcome</h3>
          <span class="label label-primary pull-right"><i class="fa fa-html5"></i></span>
        </div><!-- /.box-header -->
        <div class="box-body">
           <p>Hello @if(Auth::user()->getMetaValue('first_name')!== '')
                    {{Auth::user()->getMetaValue('first_name')}}
                    @else
                    {{Auth::user()->display_name}}
                    @endif 
               Welcome to ReemindMe Dashboard!! Start by adding your Contact to set Reminders.
            </p>
          <a href="{{URL::action('ContactController@index')}}" class="btn btn-primary"><i class="fa fa-user"></i> Add Contact</a>
        </div><!-- /.box-body -->
      </div>
</div>
@elseif($infoContactCount>0)
<div class="row">
    <div class="col-md-8">
        
          
              <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom" style="">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right ui-sortable-handle">
                  <li class=""><a href="#revenue-chart" data-toggle="tab" aria-expanded="false">calendar</a></li>
                  <li class="active"><a href="#sales-chart" data-toggle="tab" aria-expanded="true">List</a></li>
                  <li class="pull-left header"><i class="fa fa-birthday-cake"></i> Reminders</li>
                </ul>
                <div class="tab-content no-padding">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane" id="revenue-chart" style="position: relative;">
                      
                  <div class="box box-solid" style="position: relative;">
                <div class="box-header ui-sortable-handle">
                  <i class="fa fa-calendar hidden"></i>
                  <h3 class="box-title hidden">Calendar</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <!-- button with a dropdown -->
                    <div class="btn-group" style="display: none">
                      <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bars"></i></button>
                      <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="#">Add new event</a></li>
                        <li><a href="#">Clear events</a></li>
                        <li class="divider"></li>
                        <li><a href="#">View calendar</a></li>
                      </ul>
                    </div>
                    <button class="btn btn-success btn-sm hidden" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="display: block;">
                  <!--The calendar -->
                  <div id="calendar" style="width: 100%">
                     
                  </div>
                </div><!-- /.box-body -->
               
              </div>
                      
                </div>
                    
              
                  <div class="chart tab-pane active" id="sales-chart" style="position: relative;">
                      <div class="box box-info">
                <div class="box-header">
                 
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                   
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Reminder ID</th>
                          <th>Reminder To</th>
                          <th>Status</th>
                          <th>Reminder Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR9842</a></td>
                          <td>Call of Duty IV</td>
                          <td><span class="label label-success">Shipped</span></td>
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR1848</a></td>
                          <td>Samsung Smart TV</td>
                          <td><span class="label label-warning">Pending</span></td>
                          <td><div class="sparkbar" data-color="#f39c12" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR7429</a></td>
                          <td>iPhone 6 Plus</td>
                          <td><span class="label label-danger">Delivered</span></td>
                          <td><div class="sparkbar" data-color="#f56954" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR7429</a></td>
                          <td>Samsung Smart TV</td>
                          <td><span class="label label-info">Processing</span></td>
                          <td><div class="sparkbar" data-color="#00c0ef" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR1848</a></td>
                          <td>Samsung Smart TV</td>
                          <td><span class="label label-warning">Pending</span></td>
                          <td><div class="sparkbar" data-color="#f39c12" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR7429</a></td>
                          <td>iPhone 6 Plus</td>
                          <td><span class="label label-danger">Delivered</span></td>
                          <td><div class="sparkbar" data-color="#f56954" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR9842</a></td>
                          <td>Call of Duty IV</td>
                          <td><span class="label label-success">Shipped</span></td>
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div></td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="{{URL::action('ContactController@index')}}" class="btn btn-sm btn-info btn-flat pull-left">Add New Reminder</a>
                  
                </div><!-- /.box-footer -->
              </div>
                  </div>
                </div>
              </div><!-- /.nav-tabs-custom -->

             


              <!-- quick email widget -->
             

              
            
        
    </div>    
    
</div>
@endif
	
</div>
@endsection
