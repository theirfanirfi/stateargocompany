@extends('Admin.AdminLayout')
@section('content')

<div class="row">
        <div class="col-md-12 col-sm-12">
                <div class="panel tab-border card-box">
                   <header class="panel-heading panel-heading-gray custom-tab">
                       <ul class="nav nav-tabs">
                           <li class="nav-item" >
                               <a href="#about-2" data-toggle="tab" class="active">
                                   <i class="fa fa-user"></i> Personal
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="#contact-2" data-toggle="tab">
                                   <i class="fa fa-unlock"></i> Change Password
                               </a>
                           </li>
                       </ul>
                   </header>
                   <div class="panel-body">
                       <div class="tab-content">

                           <div class="tab-pane active" id="about-2">
                                <form role="form" method="POST" action="{{route('updateProfile')}}">

                                        <div class="form-group">
                                                <label for="fullname">Full Name</label>
                                        <input type="text" name="fullname" value="{{$user->name}}" class="form-control" id="fullname" placeholder="Enter your full name">
                                            </div>
                                       @csrf
                                    <div class="form-group">
                                        <label for="Email1">Email address</label>
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control" id="Email1" placeholder="Enter email">
                                    </div>
                               
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form> 
                        </div>
                           <div class="tab-pane " id="contact-2">
                                <form role="form" method="POST" action="{{route('changePassword')}}">
    
                                        <div class="form-group">
                                                <label for="currentPassword">Current Password</label>
                                        <input type="password" name="currentPassword" class="form-control" id="currentPassword" placeholder="Enter your Current Password">
                                            </div>
                                       @csrf
                                    <div class="form-group">
                                        <label for="newPassword">New Password</label>
                                    <input type="password" name="newPassword" class="form-control" id="newPassword" placeholder="Enter New Password">
                                    </div>
                               
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </form>  
                        
                        </div>
                       </div>
                   </div>
               </div>
           </div>

</div>    

    </div><!--/fluid-row-->
    
    
    <hr>
@endsection