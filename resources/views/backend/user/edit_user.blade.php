@extends('admin.admin_master')
@section('admin')

    <section class="content">

        <div class="row">

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit User</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if($errors->any())
                            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                        @endif
                        <form class="form" action="{{route('user.update',$editData->id) }}" method="post">
                            @csrf
                            <div class="box-body">
                                <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Personal Info</h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name *</label>
                                            <input type="text" name="name" required class="form-control" placeholder="Name" value="{{$editData->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>E-mail *</label>
                                            <input type="text" name="email" required class="form-control" placeholder="E-mail" value="{{$editData->email}}">
                                        </div>
                                    </div>
                                </div>

                                <h4 class="box-title text-info mt-10"><i class="ti-save mr-15"></i> Roles and Others</h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>User Role</label>
                                            <select class="form-control" name="usertype">
                                                <option {{$editData->usertype == "Admin" ? 'selected' :''}} value="Admin">Admin</option>
                                                <option {{$editData->usertype == "User" ? 'selected' :''}} value="User">User</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <input type="submit" class="btn btn-rounded btn-dark mt-5" value="Update">

                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>
        </div>


    </section>
@endsection
