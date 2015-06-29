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