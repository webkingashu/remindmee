@extends('contact.master')

@section('htmlheader_title')
    Contacts
@endsection
@section('contentheader_title')
    Contact Dashboard
@endsection
@section('contentheader_description')
List of All Contacts 
@endsection
@section('main-content')
<div>
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
                                <span class="info-box-number"></span>
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
                                            <span class="info-box-text" style="text-transform:none">Total Contacts</span>
					<span class="info-box-number">{{$contacts->count()}}</span>
					</div><!-- /.info-box-content -->
				</div><!-- /.info-box -->
			</div>	<!-- columns -->
		
		
		</div>
                <div class="col-md-12">
                  <table id="contactdata" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Contact Name</th>
                <th>Contact Email</th>
                <th>Contact Mobile</th>
                <th>Contact Type</th>
                <th>Birthday</th>
                <th>Anniversary</th>
                
                <th>Owner Id</th>
               
                <th>Actions</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Contact Name</th>
                <th>Contact Email</th>
                <th>Contact Mobile</th>
                <th>Contact Type</th>
                <th>Birthday</th>
                <th>Anniversary</th>
                
                <th>Owner Id</th>
               
                <th>Actions</th>
            </tr>
        </tfoot>
 
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{$contact->contact_name}}</td>
                <td>{{$contact->contact_email}}</td>
                <td>{{$contact->contact_mobile}}</td>
                <td>{{$contact->contact_type}}</td>
                <td>{{$contact->birthday}}</td>
                <td>{{$contact->anniversary}}</td>
                <td>{{$contact->contact_ownerid}}</td>
               
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
