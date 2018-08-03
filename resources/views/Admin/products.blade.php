@extends('Admin.AdminLayout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-topline-aqua">
                <div class="card-head">
                    <header></header>
                </div>
                <div class="card-body ">
                <div class="table-scrollable">
                    <table id="example1" class="display" style="width:100%;">
                        <thead>
                            <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Change Time</th>
                                    <th>Note</th>
                                    <th>Update on</th>
                                    <th>Group</th>
                                    <th>Indicator</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                   
                       

                                @foreach($products as $p)
                                <tr>
                                <td>{{$p->product_code}}</td>

                                <td><a href="">{{$p->product_name}}</a></td>
                                <td>{{$p->product_price}}</td>
                                <td>{{$p->product_change_time}}</td>
                                <td>{{$p->product_note}}</td>
                                <td>{{$p->updated_at}}</td>
                                <td>{{$p->getProductGroup()->group_name}}</td>
                                <td>

                                    <?php
                                    $in = $p->getProductPreviousPrice();
                                    if($in->count() > 0)
                                    {
                                        $pre = $in->first();
                                        $cu = $p->product_price;
                                        if($cu > $pre)
                                        {
                                            echo "up comp";

                                        }
                                        else {
                                            echo "down comp";
                                        }
                                    }   
                                    else {
                                        echo "up";
                                    } 
                                    ?>
                                </td>
                                    <td><a href="" class="btn btn-primary">Edit</a></td>
                            <td><a href="{{route('deleteProduct',['id' => $p->proudct_id])}}" class="btn btn-danger">Delete</a></td>
                                    
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