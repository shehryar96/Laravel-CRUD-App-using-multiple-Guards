@extends('layout.main')
@section('bloggers_sidebar') active @endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="au-card m-b-30">
                <div class="au-card-inner"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                <div class="d-flex justify-content-between mb-2">
                    <h3 class="title-2 m-b-40">Blogger Dashboard</h3>
                    <button class="btn btn-outline-primary"   data-toggle="modal" data-target="#mediumModal"><i class="fa fa-plus"></i> Add Blogs</button>
                </div>

                <table class="table table-borderless table-striped table-earning table-responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{!! $item->description !!}</td>
                        </tr>
                        @endforeach
                      
                    
                    </tbody>
                </table>
                
                
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Add Blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-name" class=" form-control-label">Title</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="title" placeholder="Enter title..." class="form-control title">
                    </div>
                </div>   

                <div class="row form-group email_div">
                    <div class="col col-md-3">
                        <label for="hf-email" class=" form-control-label">Description</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea  class="form-control blog_description" name="blog_description" rows="4" cols="50"></textarea>
                    </div>
                </div>

                <input type="hidden" name="user_role" value="" />
                <input type="hidden" name="blogger_token" value="{{Session::get('token')}}" />
                <input type="hidden" name="id" value="" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn_add_blog">Confirm</button>
            </div>
        </div>
    </div>
</div>


@endsection

