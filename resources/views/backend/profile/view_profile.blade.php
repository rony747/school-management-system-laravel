@extends('admin.admin_master')
@section('admin')

    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12">
                <div class="box box-inverse bg-img"
                     style="background-image: url({{(!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : asset('upload/bg.jpg')}});"
                     data-overlay="2">
                    <div class="flexbox px-20 pt-20">
                        <label class="toggler toggler-danger text-white">
                            <input type="checkbox">
                            <i class="fa fa-heart"></i>
                        </label>
                        <div class="dropdown">
                            <a data-toggle="dropdown" href="#"><i class="ti-more-alt rotate-90 text-white"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('profile.edit')}}"><i
                                        class="fa fa-user"></i> Edit Profile</a>
                            </div>
                        </div>
                    </div>

                    <div class="box-body text-center pb-50">
                        <a href="#">
                            <img class="avatar avatar-xxl avatar-bordered"
                                 src=" {{(!empty($user->image)) ? url('upload/user_images/'.$user->image) : asset('upload/no_image.jpg')}}"
                                 alt="Profile photo">
                        </a>
                        <h4 class="mt-2 mb-0" style="text-transform: capitalize"><a class="hover-primary text-white" href="#">{{$user->name}}</a></h4>

                    </div>

                    <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
                        <li>
                            <span class="opacity-60">Role</span><br>
                            <span class="font-size-20">{{$user->usertype}}</span>
                        </li>
                        <li>
                            <span class="opacity-60">Phone</span><br>
                            <span class="font-size-20">{{$user->mobile}}</span>
                        </li>
                        <li>
                            <span class="opacity-60">Gender</span><br>
                            <span class="font-size-20">{{$user->gender}}</span>
                        </li>
                    </ul>
                </div>

                <!-- Profile Image -->


            </div>
            <div class="col-12 col-lg-12 col-xl-12">
                <div class="box">
                    <div class="box-body box-profile">
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <p>Email :<span class="text-gray pl-10">{{$user->email}}</span></p>
                                    <p>Phone :<span class="text-gray pl-10">{{$user->mobile}}</span></p>
                                    <p>Address :<span class="text-gray pl-10">{{$user->address}}</span></p>
                                    <p>Role :<span class="text-gray pl-10">{{$user->usertype}}</span></p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>
@endsection
