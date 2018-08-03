@extends('Admin.AdminLayout')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="card-head">
                <header>Add Group</header>
            </div>
            <div class="card-body row">
                <div class="col-lg-6 p-t-20"> 
                <form action="{{route('addgroup')}}" method="POST">
                  <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                     <input class = "mdl-textfield__input" type = "text" id = "group_name" name="group_name">
                     <label class = "mdl-textfield__label">Title</label>
                  </div>
                </div>
                @csrf

                <div class="col-lg-6 p-t-20">
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Add</button>

                </div>
            </form>
            </div>
            </div>
        </div>
    </div>



    <!-- display groups -->


    <div class="row">
        <div class="col-md-12">
            <div class="card card-topline-aqua">
                <div class="card-head">
                    <header>Groups</header>
                </div>
                <div class="card-body ">
                <div class="table-scrollable">
                    <table id="example1" class="display" style="width:100%;">
                        <thead>
                            <tr>
                                    <th>Group Name</th>
                                    <th>Products</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                   
                       

                                @foreach($groups as $g)
                                <tr>
                                <td>{{$g->group_name}}</td>
                                    <td>0</td>
                                    <td><a href="" class="btn btn-primary">Edit</a></td>
                                    <td><a href="" class="btn btn-danger">Delete</a></td>
                                    
                                </tr>
                    @endforeach


                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection