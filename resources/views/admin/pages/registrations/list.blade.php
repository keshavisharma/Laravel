@extends('admin.layout.default')
@section('content')
<div class="row">
    <div class="col-xs-12">
        @if(session()->has('alert-success'))
            <div class="alert alert-success alert-dismissable" data-dismiss="alert">
                {{ session()->get('alert-success') }}
            </div>
        @endif
        @if(session()->has('alert-danger'))
            <div class="alert alert-danger alert-dismissable" data-dismiss="alert">
                {{ session()->get('alert-danger') }}
            </div>
        @endif
    </div>
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Registered Users List</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a href="{{route('admin-register')}}" class="btn btn-success btn-block" aria-pressed="true">Add New</a></li>
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <!-- <div class="card-block card-dashboard">
                    <p>Thumbnails List</p>
                </div> -->
                <div class="table-responsive">
                    <table class="table table-inverse mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Profile Photo</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                        	@foreach($thumbnails as $key => $row)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>{{$row->title}}</td>
                                <td>{{$row->image}}</td>
                                <td>
                                    @if($row->status==1)
                                    <a href="{{route('admin-update-thumbnail',['id'=>base64_encode($row->id),'status'=>'0'])}}" class="text-success">Active</a>
                                    @else
                                    <a href="{{route('admin-update-thumbnail',['id'=>base64_encode($row->id),'status'=>'1'])}}" class="text-warning">Inactive</a>
                                    @endif
                                </td>
                                <td><a href="{{route('admin-add-thumbnail',['id'=>base64_encode($row->id)])}}" class="btn btn-info">Edit</a> | <a href="{{route('admin-delete-thumbnail',['id'=>base64_encode($row->id)])}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this thumbnail?');">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody> --}}
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
