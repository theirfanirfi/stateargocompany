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
                                    <div class="mail-option no-pad-left">
                                        <div class="btn-group group-padding">
                                            <a class="btn mini tooltips" href="#" data-toggle="dropdown" data-placement="top" data-original-title="Refresh"> <i class=" fa fa-refresh fa-lg"></i>
                                            </a>
                                            <a class="btn mini tooltips" href="#" data-original-title="Archive"> <i class=" fa fa-archive fa-lg"></i>
                                            </a>
                                            <a class="btn mini tooltips" href="#" data-original-title="Trash"> <i class=" fa fa-trash-o fa-lg"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group res-email-btn">
                                            <a class="btn mini tooltips" href="#" data-original-title="Folders"> <i class=" fa fa-folder fa-lg"></i>
                                            </a>
                                            <a class="btn mini tooltips" href="#" data-original-title="Tag"> <i class=" fa fa-tag fa-lg"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group hidden-phone">
                                            <a class="btn mini blue-bgcolor" href="#" data-toggle="dropdown" aria-expanded="false"> More <i
                                                class="fa fa-angle-down downcolor"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#"><i
                                                        class="fa fa-pencil"></i> Mark as Read</a>
                                                </li>
                                                <li><a href="#"><i class="fa fa-ban"></i>
                                                        Spam</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="#"><i
                                                        class="fa fa-trash-o"></i> Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group pull-right btn-prev-next">
                                            <button class="btn btn-sm btn-primary" type="button">
                                                <i class="fa fa-chevron-left"></i>
                                            </button>
                                            <button class="btn btn-sm btn-primary" type="button">
                                                <i class="fa fa-chevron-right"></i>
                                            </button>
                                        </div>
<!-- 				                                            <div class="todo-check pull-left m-l-20"> -->
<!-- 			                                                    <input type="checkbox" value="None" id="todo-check30"> -->
<!-- 			                                                    <label for="todo-check30"></label> -->
<!-- 			                                                </div> -->
                                    </div>
                                </div>
                                <div class="inbox-body no-pad table-responsive">
                                    <table class="table table-inbox table-hover">
                                        <tbody>

                                            @foreach($conversations as $c)
                                            <tr class="unread" >
                                                <td class="inbox-small-cells">
                                                       <div class="todo-check pull-left">
                                                           <a href="">
                                                       <i style="color:red;" class="fa fa-trash"></i>
                                                           </a>
                                                    </div>
                                                </td>
                                            <td class="view-message  dont-show">{{$c->getReciever()->name}}</td>
                                            <td class="view-message " ><a href="{{route('conversation',['id' => $c->cid])}}">{{$c->getRecieverLastMessage()->message}}</a></td>
                                            <td class="view-message  text-right"><?php echo substr($c->created_at,0,10); ?></td>
                                            </tr>


@endforeach




                                        </tbody>
                                    </table>
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