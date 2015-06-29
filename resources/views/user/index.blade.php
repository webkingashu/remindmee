@extends('contact.master')

@section('htmlheader_title')
    Users
@endsection
@section('contentheader_title')
    Users Dashboard
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
		<div class="col-md-12">
		
	
			
			<div class="col-md-6">	
				<div class="info-box">
				<!-- Apply any bg-* class to to the icon to color it -->
				<a href="#" >
				<span class="info-box-icon bg-blue"><i class="fa fa-group"></i></span>
				</a>
					<div class="info-box-content">
					<span class="info-box-text" style="text-transform:none">Total Corporate Users</span>
					<span class="info-box-number">{{$infoCorpUserCount}}</span>
					</div><!-- /.info-box-content -->
				</div><!-- /.info-box -->
			</div>	<!-- columns -->
                        
                        <div class="col-md-6">	
				<div class="info-box">
				<!-- Apply any bg-* class to to the icon to color it -->
				<a href="#" >
				<span class="info-box-icon bg-blue"><i class="fa fa-group"></i></span>
				</a>
					<div class="info-box-content">
                                            <span class="info-box-text" style="text-transform:none">Total Admin Users</span>
					<span class="info-box-number">{{$infoAdminUserCount}}</span>
					</div><!-- /.info-box-content -->
				</div><!-- /.info-box -->
			</div>	<!-- columns -->
		
		
		</div>
    
                <div class="col-md-12">
                  <table id="contactdata" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Group</th>
                <th>Actions</th>
            </tr>
        </thead>
 
        <tfoot>
             <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Group</th>
                <th>Actions</th>
            </tr>
        </tfoot>
 
        <tbody>
            @foreach ($users as $user)
          <tr>
                <th>{{$user->ID}}</th>
                <th>
                    {{$user->getMetaValue('first_name')}}
                  
                </th>
                <th>{{$user->getMetaValue('last_name')}}</th>
                <th>{{$user->user_email}}</th>
                <th>@if($user->u == 1)
                    {!!'Active'!!}
                    @elseif($user->active != 1)
                    {!!'Not Active'!!}
                    @endif
                </th>
                <th>
               <?php $cap = unserialize($user->getMetaValue('wp_capabilities'));
                    print_r($cap);
              ?>
                    
                </th>
                <th><a href="#" />Edit Profile</a></th>
            </tr>
            @endforeach
        
        </tbody>
    </table>
                </div>
	</div>
	
	
	
	
</div>
@endsection
