      <!-- start page container -->
      <div class="page-container">
        <!-- start sidebar menu -->
        <div class="sidebar-container">
            <div class="sidemenu-container navbar-collapse collapse fixed-menu">
               <div id="remove-scroll" class="left-sidemenu">
                   <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                       <li class="sidebar-toggler-wrapper hide">
                           <div class="sidebar-toggler">
                               <span></span>
                           </div>
                       </li>
                       <li class="sidebar-user-panel">
                           <div class="user-panel">
                               <div class="pull-left image">
                                   <img src="{{ URL::asset('assets/img/dp.jpg') }}" class="img-circle user-img-circle" alt="User Image" />
                               </div>
                               <div class="pull-left info">
                               <p>{{Auth::user()->name}}</p>
                                   <a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline"> Online</span></a>
                               </div>
                           </div>
                       </li>


                       <li class="nav-item start ">
                       <a href="{{route('profile')}}" class="nav-link">
                               <i class="material-icons">dashboard</i>
                               <span class="title">My Profile</span>
                            
                           </a>
                       </li>


                       <li class="nav-item">
                       <a href="" class="nav-link nav-toggle">
                                <i class="material-icons">people</i>
                                <span class="title">Messages</span>
                                <span class="arrow"></span>
                             
                            </a>

                            <ul class="sub-menu">
                                    <li class="nav-item">

                                    <a href="{{route('inbox')}}" class="nav-link "> <span class="title">
                                        
                                        Inbox</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="{{route('sendmessage')}}" class="nav-link "> <span class="title">Send Message</span>
                                        </a>
                                    </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                        <a href="{{route('groups')}}" class="nav-link">
                                    <i class="material-icons">people</i>
                                    <span class="title">Groups</span>
                                  
                                 
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle">
                                        <i class="material-icons">people</i>
                                        <span class="title">Products</span>
                                        <span class="arrow"></span>
                                     
                                    </a>

                                    <ul class="sub-menu">
                                            <li class="nav-item">

                                            <a href="{{route('addproduct')}}" class="nav-link "> <span class="title">
                                                
                                                Add Product</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                            <a href="{{route('products')}}" class="nav-link "> <span class="title">Products</span>
                                                </a>
                                            </li>
                                    </ul>
                                </li>

                        


                                            <li class="nav-item">
                                                    <a href="#" class="nav-link nav-toggle">
                                                            <i class="material-icons">people</i>
                                                            <span class="title">Notifications</span>
                                                            <span class="arrow"></span>
                                                         
                                                        </a>

                                                        <ul class="sub-menu">
                                                                <li class="nav-item">

                                                                <a href="{{route('home')}}" class="nav-link "> <span class="title">
                                                                    
                                                                    View Notifications</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                <a href="{{route('home')}}" class="nav-link "> <span class="title">Custom Notifications</span>
                                                                    </a>
                                                                </li>
                                                        </ul>
                                                    </li>

                                    
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link nav-toggle">
                                                                <i class="material-icons">people</i>
                                                                <span class="title">Users</span>
                                                                <span class="arrow"></span>
                                                             
                                                            </a>
    
                                                            <ul class="sub-menu">
                                                                    <li class="nav-item">
    
                                                                    <a href="{{route('users')}}" class="nav-link "> <span class="title">
                                                                        
                                                                        Users/Partners</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                    <a href="{{route('addUser')}}" class="nav-link "> <span class="title">Add User/Partner</span>
                                                                        </a>
                                                                    </li>
                                                            </ul>
                                                        </li>
                   </ul>
               </div>
           </div>
       </div>
        <!-- end sidebar menu -->