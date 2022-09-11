@extends('admin.admin_master')
@section('admin')

    <section class="content">

        <div class="row">

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Fee</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if($errors->any())
                            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                        @endif
                        <form class="form" action="{{route('fee.amount.store')}}" method="post">
                            @csrf
                            <div class="box-body">
                                <div class="add_item">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Fee Category </label>
                                                <select class="form-control" name="fee_category_id">
                                                    <option selected disabled>Select Fee Category</option>
                                                    @foreach($fee_categories as $fee_cat)
                                                        <option value="{{$fee_cat->id}}">{{$fee_cat->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Amount *</label>
                                                <input type="text" name="amount[]" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Class Name</label>
                                                <select class="form-control" name="class_id[]">
                                                    <option selected disabled>Select Class</option>
                                                    @foreach($classes as $class)
                                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="padding-top: 25px">
                                        <span class="btn btn-success addeventmore"> <i
                                                class="fa fa-plus-circle"></i></span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <input type="submit" class="btn btn-rounded btn-dark mt-5" value="Save">

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

    <div style="visibility: hidden">
        <div class="whole_extra_item_add " id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add " id="delete_whole_extra_item_add">
                <div class="row ">

                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Amount *</label>
                            <input type="text" name="amount[]" required class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Class Name</label>
                            <select class="form-control" name="class_id[]">
                                <option selected disabled>Select Class</option>
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2" style="padding-top: 25px">
                        <span class="btn btn-danger removeeventmore"> <i class="fa fa-minus-circle"></i></span>
                        <span class="btn btn-success addeventmore"> <i class="fa fa-plus-circle"></i></span>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function ($) {
            let counter = 0;
            $(document).on("click", '.addeventmore', function () {
                let whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest('.add_item').append(whole_extra_item_add);
                counter++;

            })
            $(document).on("click", '.removeeventmore', function () {
                let delete_whole_extra_item_add = $('#delete_whole_extra_item_add').html();
                $(this).closest('.delete_whole_extra_item_add').remove();
                counter--;
            })
        });

    </script>
@endsection
