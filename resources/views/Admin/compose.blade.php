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
                        <div class="inbox-body">
                        <div class="inbox-header">
                        </div>
                        <div class="inbox-body no-pad">
                            <div class="mail-list">
                                <div class="compose-mail">
                                    <form method="post" action="{{route('postMessage')}}">
                                        <div class="form-group">
                                            <label for="to" class="">To:</label>

                                            <select name="user_id" class="form-control">
                                                <option>Select User/Partner</option>
                                                @foreach($users as $u)
                                            <option value="{{$u->id}}">{{$u->name}}</option>
                                                  @endforeach
                                            </select>
                                        </div>

                                        <div class="compose-editor">
                                            <textarea name="message" class="form-control" rows="14"></textarea>
                                          @csrf
                                        </div>
                                        <div class="btn-group margin-top-20 ">
                                            <button class="btn btn-primary btn-sm margin-right-10"><i class="fa fa-check"></i> Send</button>
                                        </div>
                                       
                                    </form>
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