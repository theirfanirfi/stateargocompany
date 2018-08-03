@extends('Admin.AdminLayout')
@section('content')
<div class="row">
    <div class="col-sm-12">

        <div class="card-box">
            <div class="card-head">
                <header></header>
            </div>
            <form action="{{route('processProduct')}}" method="POST">

            <div class="card-body row">

                <div class="col-lg-6 p-t-20"> 
          
                  <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                     <input class = "mdl-textfield__input" type = "text" id = "product_code" name="product_code" placeholder="Product Code">
                     <label class = "mdl-textfield__label">Product Code</label>
                  </div>
                </div>


                <div class="col-lg-6 p-t-20"> 
          
                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                           <input class = "mdl-textfield__input" type = "text" id = "product_name" name="product_name" placeholder="Product Name">
                           <label class = "mdl-textfield__label">Product Name</label>
                        </div>
                      </div>


                      <div class="col-lg-6 p-t-20"> 
          
                            <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class = "mdl-textfield__input" type = "number" id = "product_price" name="product_price" placeholder="Product Price">
                               <label class = "mdl-textfield__label">Product Price</label>
                            </div>
                          </div>

                          <div class="col-lg-6 p-t-20"> 
          
                                <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                   <input class = "mdl-textfield__input" type = "text" id = "product_note" name="product_note" placeholder="Product Note">
                                   <label class = "mdl-textfield__label">Product Note</label>
                                </div>
                              </div>


                              <div class="col-lg-6 p-t-20"> 
                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                          <select name="group_id" style="width:100%;padding:8px;">
                                              <option value="">Select Group</option>
                                              @foreach($groups as $g)
                                          <option value="{{$g->g_id}}">{{$g->group_name}}</option>
                                              @endforeach
                                          </select>
                                         
                                         </div>
                                     </div>

            </div>
            <div class="row">

                @csrf
                <div class="col-lg-1"></div>
                <div class="col-lg-11 p-t-20">
                    <button style="float:right;" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Add</button>

                </div>
            </form>
            </div>
            </div>
        </div>
    </div>

@endsection