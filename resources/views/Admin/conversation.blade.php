@extends('Admin.AdminLayout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-gray">
            <div class="card-body no-padding height-9">
                <div class="inbox">
                   <div class="row">
                        <div class="col-md-3">
                            <div class="inbox-sidebar">
                                <a href="{{route('sendmessage')}}" data-title="Compose" class="btn red compose-btn btn-block">
                                        <i class="fa fa-edit"></i> Send New Message </a>
                                    <ul class="inbox-nav inbox-divider">
                                    <li class="active"><a href="{{route('inbox')}}"><i
                                                class="fa fa-inbox"></i> Inbox
                                                @if($inboxCount > 0)
                                                <span
                                                class="label mail-counter-style label-danger pull-right"> {{$inboxCount}}</span>
                                                @endif
                                            </a>
                                        </li>
                                    </ul>
    
    
                                    <ul class="nav nav-pills nav-stacked labels-info inbox-divider">
                                        <li>
                                            <h4>Groups Inbox</h4>
                                        </li>
    
                                        @foreach($groups as $g)
                                    <li><a href="{{route('groupInbox',['id' => $g->g_id])}}"><i
                                        class="fa fa-tags"></i>  {{$g->group_name}}</a>
                                        </li>
                                @endforeach
                                    </ul>
    
    
                                </div>
                        </div>

                    <div class="col-md-9">
                       
                     <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="width:100%;"> 
                                <div class="card  card-box" >
                                    <div class="card-head">
                                        <header></header>
                                        <button id = "chatlist" 
                                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
                                           data-upgraded = ",MaterialButton">
                                           <i class = "material-icons">more_vert</i>
                                        </button>
                                        <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                           data-mdl-for = "chatlist">
                                           <li class = "mdl-menu__item"><i class="material-icons">refresh</i>Refresh</li>
                                        </ul>
                                    </div>
                                    <div class="card-body no-padding height-9" style="width:100%;">
                                        <div class="row">
                                            <ul class="chat nice-chat small-slimscroll-style" style="width:100%;">

                                                @foreach($msgs as $m)
                                                @if($m->sender_id == $user->id)
                                                <li class="in" ><img src="../assets/img/prof/prof1.jpg" class="avatar" alt="">
                                                    <div class="message">
                                                    <span class="arrow"></span> <a class="name" href="#">{{$user->name}}</a> <span class="datetime">at Mar 12, 2014 6:12</span> <span class="body"> 
                                                    {{$m->message}}    
                                                    </span>
                                                    </div>
                                                </li>
                                                @else
                                                <li class="out"><img src="../assets/img/dp.jpg" class="avatar" alt="">
                                                    <div class="message">
                                                    <span class="arrow"></span> <a class="name" href="#">{{$reciever->name}}</a> <span class="datetime">at Mar 12, 2014 6:13</span> <span class="body">
                                                        {{$m->message}}
                                                    </span>
                                                    </div>
                                                </li>
                                                @endif
                                                @endforeach
                                            </ul>
                                            <div class="box-footer chat-box-submit">
                                       
                                              <div class="input-group">
                                                <input type="text" name="message" placeholder="Enter your ToDo List" class="form-control">
                                                <span class="input-group-btn">
                                                <button type="submit" class="btn btn-warning btn-flat"><i class="fa fa-arrow-right"></i></button>
                                                </span> </div>
                                            
                                       </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                    </div>

                    


                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection