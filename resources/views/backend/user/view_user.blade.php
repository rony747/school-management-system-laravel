@extends('admin.admin_master')
@section('admin')

    <section class="content">

        <div class="row">

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Users</h3>
                        <a href="{{route('user.add')}}" class="btn btn-rounded btn-dark mb-5" style="float: right">Add New User</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($allData as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$row->usertype}}</td>
                                    <td> <img class="mr-10" width="40px" height="auto" style="border-radius: 100px" src="{{(!empty($row->image)) ? url('upload/user_images/'.$row->image) : asset('upload/no_image.jpg')}}" alt="">
                                        {{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td><a href="{{route('user.edit', $row->id)}}" class="btn btn-circle btn-dark btn-sm mr-2"><i class="mdi mdi-pencil"></i></a>
                                    <a href="{{route('user.delete', $row->id)}}" class="btn btn-circle btn-dark btn-sm mr-2" id="delete"><i class="mdi mdi-close"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>
        </div>


    </section>
@endsection
