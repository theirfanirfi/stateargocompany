@extends('Admin.AdminLayout')
@section('content')




    <!-- display groups -->


    <div class="row">
        <div class="col-md-12">
            <div class="card card-topline-aqua">
                <div class="card-head">
                    <header>Users/Partners</header>
                </div>
                <div class="card-body ">
                <div class="table-scrollable">
                    <table id="example1" class="display" style="width:100%;">
                        <thead>
                            <tr>
                                    <th>Partner Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Group Name</th>
                                    <th>Evaluation</th>
                                    <th>Note</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                   
                       

                                @foreach($users as $u)
                                <tr>
                                <td><a href="{{route('groupProducts',['id' => $u->id])}}">{{$u->name}}</a></td>
                                <td>{{$u->address}}</td>
                                <td>{{$u->phone}}</td>
                                <td>{{$u->getGroupForUser()->group_name}}</td>
                                <td>{{$u->evaluation}}</td>
                                <td>{{$u->note}}</td>
                                <td><a href="{{route('editUser',['id'=>$u->id])}}" class="btn btn-primary">Edit</a></td>
                                <td><a href="{{route('deleteUser',['id' => $u->id])}}" class="btn btn-danger">Delete</a></td>
                                    
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