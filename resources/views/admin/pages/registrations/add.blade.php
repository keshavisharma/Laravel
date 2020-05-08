@extends('admin.layout.default')
@section('content')
<div class="row match-height">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Register</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <div class="form-group row add">
                        <div class="col-md-2">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter first name" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                placeholder="Enter last name">
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter email">
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                        <div class="col-md-2">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter password" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" type="submit" id="add">
                                <span class="glyphicon glyphicon-plus"></span> ADD
                            </button>
                        </div>
                    </div>
                </div>
                @csrf
                <div class="card-block">
                    <div class="table-responsive text-center">
                        <table class="table table-borderless" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">First Name</th>
                                    <th class="text-center">Last Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            @foreach($reg as $item)
                            <tr class="item{{$item->id}}">
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->last_name}}</td>
                                <td>{{$item->email}}</td>
                                <td><button class="edit-modal btn btn-info" data-id="{{$item->id}}"
                                data-name="{{$item->name}}" data-last_name="{{$item->last_name}}">
                                        <span class="glyphicon glyphicon-edit"></span> Edit
                                    </button>
                                    @if($role->role == 'superadmin')
                                    <button class="delete-modal btn btn-danger"
                                        data-id="{{$item->id}}" data-name="{{$item->name}}">
                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                    </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="id">ID:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="fid" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="name">First Name:</label>
                                        <div class="col-sm-8">
                                            <input type="name" class="form-control" id="f_n">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="last_name">Last Name:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="l_n">
                                        </div>
                                    </div>
                                </form>
                                <div class="deleteContent">
                                    Are you sure you want to delete <span class="dname"></span> ? <span
                                        class="hidden did"></span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                                        <span id="footer_action_button" class='glyphicon'> </span>
                                    </button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                                        <span class='glyphicon glyphicon-remove'></span> Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer-js')
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {

    $(document).on('click', '.edit-modal', function() {
        console.log($(this).data())
            $('#footer_action_button').text("Update");
            $('#footer_action_button').addClass('glyphicon-check');
            $('#footer_action_button').removeClass('glyphicon-trash');
            $('.actionBtn').addClass('btn-success');
            $('.actionBtn').removeClass('btn-danger');
            $('.actionBtn').addClass('edit');
            $('.modal-title').text('Edit');
            $('.deleteContent').hide();
            $('.form-horizontal').show();
            $('#fid').val($(this).data('id'));
            $('#f_n').val($(this).data('name'));
            $('#l_n').val($(this).data('last_name'));
            $('#myModal').modal('show');
        });
        $(document).on('click', '.delete-modal', function() {
            $('#footer_action_button').text(" Delete");
            $('#footer_action_button').removeClass('glyphicon-check');
            $('#footer_action_button').addClass('glyphicon-trash');
            $('.actionBtn').removeClass('btn-success');
            $('.actionBtn').addClass('btn-danger');
            $('.actionBtn').addClass('delete');
            $('.modal-title').text('Delete');
            $('.did').text($(this).data('id'));
            $('.deleteContent').show();
            $('.form-horizontal').hide();
            $('.dname').html($(this).data('name'));
            $('#myModal').modal('show');
        });

        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'post',
                url: '/new_project/admin/editItem',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#fid").val(),
                    'name': $('#f_n').val(),
                    'last_name': $('#l_n').val()
                },
                success: function(data) {
                    console.log(data)
                    $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.last_name + "</td><td>" + data.email + "</td><td><button class='edit-modal btn btn-info' data-last_name='" + data.last_name +"' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            });
        });
        $("#add").click(function() {
            const name = document.querySelector('input[name=name]')
            if (name.value.trim() === '') {
                return false
            } else {

                $.ajax({
                    type: 'post',
                    url: '/new_project/admin/addItem',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'name': $('input[name=name]').val(),
                        'last_name': $('input[name=last_name]').val(),
                        'email': $('input[name=email]').val(),
                        'password':$('input[name=password]').val()
                    },
                    success: function(data) {
                        if ((data.errors)){
                        $('.error').removeClass('hidden');
                            $('.error').text(data.errors.name);
                        }
                        else {
                            $('.error').addClass('hidden');
                            $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.last_name + "</td><td>" + data.email + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button> </td></tr>");
                        }
                    },

                });
            }

            $('#name').val('');
            $('#last_name').val('');
            $('#email').val('');
            $('#password').val('');
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'post',
                url: '/new_project/admin/deleteItem',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $('.did').text()
                },
                success: function(data) {
                    $('.item' + $('.did').text()).remove();
                }
            });
        });
    });
</script>
@endsection
