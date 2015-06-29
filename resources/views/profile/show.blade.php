@extends('app')

@section('htmlheader_title')
    Account Details
@endsection
@section('contentheader_title')
    Account Details
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
					<span class="info-box-text" style="text-transform:none">Total Employee(s)</span>
					<span class="info-box-number">{{$contacts->where('contact_type','=','employee')->count()}}</span>
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
                                            <span class="info-box-text" style="text-transform:none">Total Contacts<sub>Including Employee Spaus & childrens</sub></span>
					<span class="info-box-number">{{$contacts->count()}}</span>
					</div><!-- /.info-box-content -->
				</div><!-- /.info-box -->
			</div>	<!-- columns -->
		
		
		</div>
                <div class="col-md-12">
        data tables
                </div>
	</div>
	
	
	
	
</div>
@endsection
