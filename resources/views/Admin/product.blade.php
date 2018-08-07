@extends('Admin.AdminLayout')
@section('content')

<div class="row">
        <div class="col-md-12 col-sm-12">
                <div class="panel tab-border card-box">
                   <header class="panel-heading panel-heading-gray custom-tab">
                       <ul class="nav nav-tabs">
                           <li class="nav-item" >
                               <a href="#about-2" data-toggle="tab" class="active">
                                   <i class="fa fa-user"></i> Update Product
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="#contact-2" data-toggle="tab">
                                   <i class="fa fa-unlock"></i> Product Price(s)
                               </a>
                           </li>
                       </ul>
                   </header>
                   <div class="panel-body">
                       <div class="tab-content">

                           <div class="tab-pane active" id="about-2">


                                <form action="{{route('updateProduct')}}" method="POST">

                            
                                            <div class="col-lg-6 p-t-20"> 
                                      
                                              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                              <input class = "mdl-textfield__input" type = "text" id = "product_code" name="product_code" placeholder="Product Code" value="{{$product->product_code}}">
                                                 <label class = "mdl-textfield__label">Product Code</label>
                                              </div>
                                            </div>
                            
                            
                                            <div class="col-lg-6 p-t-20"> 
                                      
                                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                       <input class = "mdl-textfield__input" type = "text" id = "product_name" name="product_name" placeholder="Product Name" value="{{$product->product_name}}">
                                                       <label class = "mdl-textfield__label">Product Name</label>
                                                    </div>
                                                  </div>
                            
                            
                                                  <div class="col-lg-6 p-t-20"> 
                                      
                                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                           <input class = "mdl-textfield__input" type = "number" id = "product_price" name="product_price" placeholder="Product Price" value="{{$product->product_price}}">
                                                           <label class = "mdl-textfield__label">Product Price</label>
                                                        </div>
                                                      </div>
                            
                                                      <div class="col-lg-6 p-t-20"> 
                                      
                                                            <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                               <input class = "mdl-textfield__input" type = "text" id = "product_note" name="product_note" placeholder="Product Note" value="{{$product->product_note}}">
                                                               <label class = "mdl-textfield__label">Product Note</label>
                                                            </div>
                                                          </div>
                            
                                                        <input type="hidden" name="product_id" value="{{$product->product_id}}" />
                                                          <div class="col-lg-6 p-t-20"> 
                                                                <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                                      <select name="group_id" style="width:100%;padding:8px;">
                                                                          <option value="">Select Group</option>
                                                                          @foreach($groups as $g)
                                                                      <option value="{{$g->g_id}}" @if($product->group_id == $g->g_id) {{"selected"}} @endif>{{$g->group_name}}</option>
                                                                          @endforeach
                                                                      </select>
                                                                     
                                                                     </div>
                                                                 </div>
                            
                                      
                                        <div class="row">
                            
                                            @csrf
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-11 p-t-20">
                                                <button style="float:right;" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Update</button>
                            
                                            </div>
                                        </form>

                        </div>
                       </div>
                           <div class="tab-pane " id="contact-2">
 
                                <div class="card card-topline-aqua">
                                        <div class="card-head">
                                            <header></header>
                                        </div>
                                        <div class="card-body ">
                                        <div class="table-scrollable">
                                            <table id="example1" class="display" style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Price</th>
                                                        <th>Price Change on</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                           
                                               
                                                    @if(!empty($prices))
                                                        @foreach($prices as $p)
                                                        <tr>
                                                        <td>{{$p->price}}</td>
                                                        <td>{{$p->created_at}}</td>

                                                    <td><a href="{{route('deleteProductPrice',['id' => $p->pp_id])}}" class="btn btn-danger">Delete</a></td>
                                                            
                                                        </tr>
                                            @endforeach
                                            @endif
                        
                        
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

    </div><!--/fluid-row-->
    
    
    <hr>
@endsection