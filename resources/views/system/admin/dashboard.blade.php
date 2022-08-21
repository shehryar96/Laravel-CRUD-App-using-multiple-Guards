@extends('layout.main')
@section('admin_sidebar') active @endsection
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="au-card m-b-30">
                    <div class="au-card-inner"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <div class="d-flex justify-content-between mb-2">
                        <h3 class="title-2 m-b-40">Admin Dashboard</h3>
                        <button class="btn btn-outline-primary"  data-toggle="modal" data-target="#mediumModal"><i class="fa fa-plus"></i> Add</button>
                    </div>
                    {{-- @php dd(Session::get('token')) @endphp --}}
                    
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th >Role</th>
                                    <th >Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ ucfirst($item->role) }}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                                {{-- users --}}
                                @foreach ($users as $val)
                                <tr>
                                    <td>{{ $val->id }}</td>
                                    <td>{{ $val->name }}</td>
                                    <td>{{ $val->email }}</td>
                                    <td>{{ ucfirst($val->role) }}</td>
                                    <td>    
                                        <span data-user="{{json_encode($val)}}" class="edit_user"><i class="fa fa-edit"></i></span>
                                        &nbsp; &nbsp;
                                        <span data-user="{{json_encode($val)}}"
                                        class="delele_user_btn"><i class="fa fa-trash "></i></span>
                                    </td>
                                </tr>
                                @endforeach
                                {{-- bloggers --}}
                                @foreach ($bloggers as $blo)
                                <tr>
                                    <td>{{ $blo->id }}</td>
                                    <td>{{ $blo->name }}</td>
                                    <td>{{ $blo->email }}</td>
                                    <td>{{ ucfirst($blo->role) }}</td>
                                    <td>    
                                        <span data-user="{{json_encode($blo)}}" class="edit_user"><i class="fa fa-edit"></i></span>
                                        &nbsp;
                                        <span data-user="{{json_encode($blo)}}" class="delele_user_btn"><i class="fa fa-trash "></i></span>
                                    </td>
                                </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- add modal --}}

    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form-horizontal">

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-name" class=" form-control-label">Name</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="email" id="hf-email" name="name" placeholder="Enter Name..." class="form-control">
                            </div>
                        </div>   
                        <div class="row form-group email_div">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Email</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="email" id="hf-email" name="email" placeholder="Enter Email..." class="form-control">
                            </div>
                        </div>
                        <div class="row form-group pasword_div">
                            <div class="col col-md-3">
                                <label for="hf-password" class=" form-control-label">Password</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="hf-password" name="password" placeholder="Enter Password..." class="form-control">
                            </div>
                         </div>

                         <div class="row form-group pasword_div">
                            <div class="col col-md-3">
                                <label for="hf-password" class=" form-control-label">Select Role</label>
                            </div>
                            <div class="col-12 col-md-9 role_div">
                                <Select class="form-control select_type" id="select" name="role">
                                    <option value="" selected>Select Role</option>
                                    <option value="admin" >Admin</option>
                                    <option value="user" >User</option>
                                    <option value="blogger" >Blogger</option>
                                </Select>
                            </div>
                        
                         </div>

                         <input type="hidden" name="user_role" value="{{Auth::guard('web-admins')->user()->role}}" />
                         <input type="hidden" name="token" value="{{Session::get('token')}}" />
                         <input type="hidden" name="id" value="" />


                         
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary create_user">Confirm</button>
                    <button type="button" class="btn btn-primary edit_user_btn" style="display: none;">Confirm</button>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')

@endsection



