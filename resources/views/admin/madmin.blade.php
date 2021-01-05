<?php
if (Auth('admin')->User()->dashboard_style == "light") {
    $text = "dark";
} else {
    $text = "light";
}
?>
@extends('layouts.app')
    @section('content')
        @include('admin.topmenu')
        @include('admin.sidebar')
        <div class="main-panel bg-{{Auth('admin')->User()->dashboard_style}}">
            <div class="content bg-{{Auth('admin')->User()->dashboard_style}}">
                <div class="page-inner">
                    <div class="mt-2 mb-4">
                    <h1 class="title1 text-{{$text}}">Managers List</h1>
                    </div>
                    @if(Session::has('message'))
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i> {{Session::get('message')}}
                            </div>
                        </div>
                    </div>
                    @endif
        
                    @if(count($errors) > 0)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissable" role="alert" >
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                @foreach ($errors->all() as $error)
                                <i class="fa fa-warning"></i> {{ $error }}
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                   
                    <div class="row mb-5">
                        <div class="col p-4 shadow card bg-{{Auth('admin')->User()->dashboard_style}}">
                            <div class="table-responsive" data-example-id="hoverable-table">
                                <table id="ShipTable" class="table table-hover text-{{$text}}"> 
                                    <thead> 
                                        <tr> 
                                            <th>USER ID</th>
                                            <th>FIRSTNAME</th>
                                            <th>LASTNAME</th>
                                            <th>EMAIL</th>
                                            <th>PHONE</th>
                                            <th>TYPE</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                        </tr> 
                                    </thead> 
                                    <tbody> 
                                    @foreach($admins as $admin)
                                    <tr>
                                        <td>{{$admin->id}}</td>
                                        <td>{{$admin->firstName}}</td>
                                        <td>{{$admin->lastName}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{$admin->phone}}</td>
                                        <td>{{$admin->type}}</td>
                                        <td>{{$admin->acnt_type_active}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Actions
                                                </a>
                                                <div class="dropdown-menu bg-{{Auth('admin')->User()->dashboard_style}}" aria-labelledby="dropdownMenuLink">

                                                    @if($admin->acnt_type_active==NULL || $admin->acnt_type_active=='blocked')
                                                    <a class="btn btn-primary btn-sm m-1" href="{{ url('admin/dashboard/unblock') }}/{{$admin->id}}">Unblock</a> 
                                                    @else
                                                    <a class="btn btn-danger btn-sm m-1" href="{{ url('admin/dashboard/ublock') }}/{{$admin->id}}">Block</a>
                                                    @endif
                                                    <a href="#" data-toggle="modal" data-target="#resetpswdModal{{$admin->id}}"  class="btn btn-warning btn-sm m-1">Reset Password</a>
                                                    
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal{{$admin->id}}" class="btn btn-danger btn-sm m-1">Delete</a>
                                                    <a href="#" data-toggle="modal" data-target="#edituser{{$admin->id}}" class="btn btn-secondary btn-sm m-1">Edit</a>
                                                    <a href="#" data-toggle="modal" data-target="#sendmailModal{{$admin->id}}" class="btn btn-info btn-sm m-1">Send Email</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>


                                    <!-- Reset user password Modal -->
										<div id="resetpswdModal{{$admin->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
            
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                <div class="modal-header bg-{{Auth('admin')->User()->dashboard_style}} ">
                                                    
                                                    <h4 class="modal-title text-{{$text}}">Reset Password</strong></h4>
                                                    <button type="button" class="close text-{{$text}}" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-{{Auth('admin')->User()->dashboard_style}} p-3">
                                                    <p class="text-{{$text}}">Are you sure you want to reset password for {{$admin->firstName}} to <span class="text-primary font-weight-bolder">admin01236</span></p>
                                                    <a class="btn btn-danger" href="{{ url('admin/dashboard/resetadpwd') }}/{{$admin->id}}">Reset Now</a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Reset user password Modal -->

                                        <!-- Delete user Modal -->
										<div id="deleteModal{{$admin->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
            
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                <div class="modal-header bg-{{Auth('admin')->User()->dashboard_style}}">
                                                    
                                                    <h4 class="modal-title text-{{$text}}">Delete Manager</strong></h4>
                                                    <button type="button" class="close text-{{$text}}" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-{{Auth('admin')->User()->dashboard_style}} p-3">
                                                    <p class="text-{{$text}}">Are you sure you want to delete {{$admin->firstName}}</p>
                                                    <a class="btn btn-danger" href="{{ url('admin/dashboard/deluser') }}/{{$admin->id}}">Yes i'm sure</a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Delete user Modal -->
                                        
								<!-- Edit user Modal -->
                                    <div id="edituser{{$admin->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                                <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header bg-{{Auth('admin')->User()->dashboard_style}}">
                                                    
                                                    <h4 class="modal-title text-{{$text}}">Edit user details.</strong></h4>
                                                    <button type="button" class="close text-{{$text}}" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-{{Auth('admin')->User()->dashboard_style}}">
                                                        <form style="padding:3px;" role="form" method="post" action="{{route('editadmin')}}">
                                                            <h5 class=" text-{{$text}}">Firstname</h5>
                                                            <input style="padding:5px;" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$admin->firstName}}" type="text" name="fname" required><br/>
                                                            <h5 class=" text-{{$text}}">Lastname</h5>
                                                            <input style="padding:5px;" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$admin->lastName}}" type="text" name="l_name" required><br/>
                                                            <h5 class=" text-{{$text}}">Email</h5>
                                                            <input style="padding:5px;" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$admin->email}}" type="email" name="email" required><br/>
                                                            <h5 class=" text-{{$text}}">Phone Number</h5>
                                                            <input style="padding:5px;" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$admin->phone}}" type="text" name="phone" required>
                                                            <br>
                                                            <h5 class=" text-{{$text}}">Type</h5>
                                                            <select class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" name="type">
                                                                <option>{{$admin->type}}</option>
                                                                <option>Super Admin</option>
                                                                <option>Admin</option>
                                                                {{-- <option>Accountant</option>
                                                                <option>Help Desk</option> --}}
                                                            </select><br>
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="hidden" name="user_id" value="{{$admin->id}}">
                                                            <input type="submit" class="btn btn-info" value="Update account">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Edit user Modal -->
                                    <!-- send a single user email Modal-->
                                    <div id="sendmailModal{{$admin->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header bg-{{Auth('admin')->User()->dashboard_style}}">
                                                    <h4 class="modal-title text-{{$text}}">Send Email Message</h4>
                                                    <button type="button" class="close text-{{$text}}" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <div class="modal-body bg-{{Auth('admin')->User()->dashboard_style}}">
                                                    <p class="text-{{$text}}">This message will be sent to {{$admin->firstName}} {{$admin->lastName}} </p>
                                                    <form role="form" method="post" action="{{action('Admin\UsersController@sendmail')}}">

                                                        <input type="hidden" name="user_id" value="{{$admin->id}}">
                                                        <textarea class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" name="message " row="3" placeholder="Type your message here" required></textarea><br/>
                                                        
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="btn btn-primary" value="Send">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    @endforeach
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
    @endsection