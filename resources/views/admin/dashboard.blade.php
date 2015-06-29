@extends('app')

@section('htmlheader_title')
    Home
@endsection
@section('contentheader_title')
    Dashboard
@endsection
@section('contentheader_description')
Admin Panel
@endsection
@section('main-content')
<div class="container">
@if($infoSubscribType == 'Admin')
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
                <a href="{{URL::action('UserController@create')}}" class="small-box-footer">Add New<i class="fa fa-arrow-circle-right"></i></a>
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
                <a href="#" class="small-box-footer">Add New <i class="fa fa-arrow-circle-right"></i></a>
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
<!-- @if(Auth::user()->group_id==1) -->
<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{ isset($infoCorpUserCount) ? $infoCorpUserCount : 'NA' }}</h3>
                  <p>{{isset($infoCorpUserTitle) ? $infoCorpUserTitle : 'NA'}}</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{url('user/create')}}" class="small-box-footer">Add New<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{isset($infoContactCount) ? $infoContactCount : 'NA' }}</h3>
                  <p>{{isset($infoContactTitle) ? $infoContactTitle : 'NA'}}</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                  <a href="#" class="small-box-footer" >&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{isset($infoReminderCount) ? $infoReminderCount : 'NA'}}</h3>
                  <p>{{isset($infoReminderTitle) ? $infoReminderTitle : 'NA'}}</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Add New <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6" style="display:none">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>106</h3>
                  <p>Remaining Reminder Credit</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			
          </div>

@endif
	
</div>
@endsection
