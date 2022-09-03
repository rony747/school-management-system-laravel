@extends('admin.admin_master')
@section('admin')

    <section class="content">

        <div class="row">

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Classes</h3>
                        <a href="{{route('student.class.add')}}" class="btn btn-rounded btn-dark mb-5" style="float: right">Add New Class</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th>Name</th>
                                    <th width="20%">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($allData as $key=>$row)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$row->name}}</td>
                                        <td><a href="{{route('student.class.edit', $row->id)}}" class="btn btn-circle btn-dark btn-sm mr-2"><i class="mdi mdi-pencil"></i></a>
                                            <a href="{{route('student.class.delete', $row->id)}}" class="btn btn-circle btn-dark btn-sm mr-2" id="delete"><i class="mdi mdi-close"></i></a>

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
