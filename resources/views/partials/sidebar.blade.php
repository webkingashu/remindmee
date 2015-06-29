<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p> @if(Auth::user()->getMetaValue('first_name')!== '')
                    {{Auth::user()->getMetaValue('first_name')}}
                    @else
                    {{Auth::user()->display_name}}
                    @endif
                    
                </p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form" style="display:none">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header" style="display:none">HEADER</li>
            <!-- Optionally, you can add icons to the links -->

            <li class="active">
                <a href="{{ url('home') }}" class="bg-light-blue-gradient">
                    <i class='fa fa-dashboard'></i> 
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="{{URL::action('SenderIdController@index')}}">
                    <i class='fa fa-arrow-circle-right'></i> 
                    <span>Sender ID</span>
                </a>
            </li>
            
            <li class="active">
                <a href="{{URL::action('ContactController@index')}}" >
                    <i class='fa fa-users'></i> 
                    <span >Contacts</span>
                </a>
            </li>
            
            <li class="active">
                <a href="{{URL::action('ReminderController@index')}}" class="bg-light-blue-gradient">
                    <i class='fa fa-clock-o'></i> 
                    <span >Reminders</span>
                </a>
            </li>
             <li class="treeview">
                <a href="#"><i class='fa fa-birthday-cake'></i> <span>Birthday Reminders</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">All Birthdays</a></li>
                    <li><a href="#">Upcoming Birthdays<sub class="pull-right">This Year</sub></a></li>
                   
                  
                   
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-diamond'></i> <span>Anniversary Reminders</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">All Anniversaries</a></li>
                    <li><a href="#">Upcoming Anniversaries<sub class="pull-right">This Year</sub></a></li>
                   
                   
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-star'></i> <span>Special Day Reminders</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">All Special Days</a></li>
                    <li><a href="#">Upcoming Special Days<sub class="pull-right">This Year</sub></a></li>
                 
                   
                </ul>
            </li>
            
            


        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>