@extends('Admin.AdminLayout')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="card-head">
                <header></header>
            </div>
            <div class="card-body row">
                <div class="col-lg-6 p-t-20"> 
                <form action="{{route('groupEdit')}}" method="POST">
                  <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                  <input class = "mdl-textfield__input" type = "text" id = "group_name" name="group_name" value="{{$group->group_name}}">
                     <label class = "mdl-textfield__label">Title</label>
                  </div>
                </div>
                @csrf
            <input type="hidden" name="group_id" value="{{$group->g_id}}" />
                <div class="col-lg-6 p-t-20">
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Update</button>

                </div>
            </form>
            </div>
            </div>
        </div>
    </div>


@endsection