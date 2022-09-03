
@extends('admin.admin_master')
@section('admin')

    <section class="content">

        <div class="row">

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Profile</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if($errors->any())
                            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                        @endif
                        <form class="form" action="{{route('profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Personal Info</h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name *</label>
                                            <input type="text" name="name" required class="form-control" placeholder="Name" value="{{$user->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>E-mail *</label>
                                            <input type="text" name="email" required class="form-control" placeholder="E-mail" value="{{$user->email}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input type="text" name="mobile" class="form-control" placeholder="Mobile" value="{{$user->mobile}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender </label>
                                            <select class="form-control" name="gender">
                                                <option {{$user->gender == "" ? 'selected' :''}} disabled>Select gender</option>
                                                <option {{$user->gender == "Male" ? 'selected' :''}} value="Male">Male</option>
                                                <option {{$user->gender == "Female" ? 'selected' :''}} value="Female">Female</option>
                                                <option {{$user->gender == "Other" ? 'selected' :''}} value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control" placeholder="Address" value="{{$user->address}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>

                                <h4 class="box-title text-info mt-10"><i class="ti-save mr-15"></i> Others</h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <div class="mb-10">
                                                <img class="avatar avatar-xxl avatar-bordered" id="showImage"
                                                     src=" {{(!empty($user->image)) ? url('upload/user_images/'.$user->image) : asset('upload/no_image.jpg')}}"
                                                     alt="Profile photo">
                                            </div>

                                            <label>Profile Photo</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="mb-10">
                                                <img class="avatar avatar-xxl avatar-bordered" id="showCoverImage"
                                                     src=" {{(!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : asset('upload/no_image.jpg')}}"
                                                     alt="Profile photo">
                                            </div>

                                            <label>Cover Photo</label>
                                            <input type="file" name="profile_photo_path" id="profile_photo_path" class="form-control">
                                        </div>
                                    </div>
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
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#image').on('change', function (e) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        })
    })
    $(document).ready(function () {
        $('#profile_photo_path').on('change', function (e) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#showCoverImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        })
    })
</script>
