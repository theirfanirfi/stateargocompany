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
                     <input class = "mdl-textfield__input" type = "text" id = "fullname" name="fullname" placeholder="Full Name">
                     <label class = "mdl-textfield__label">Full Name</label>
                  </div>
                </div>


                <div class="col-lg-6 p-t-20"> 
          
                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                           <input class = "mdl-textfield__input" type = "email" id = "email" name="email" placeholder="Email">
                           <label class = "mdl-textfield__label">Email</label>
                        </div>
                      </div>


                      <div class="col-lg-6 p-t-20"> 
          
                            <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class = "mdl-textfield__input" type = "password" id = "password" name="password" placeholder="Password">
                               <label class = "mdl-textfield__label">Password</label>
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