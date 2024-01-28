@extends('layouts.master')
@section('home-active','nav-link active')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card mb-3 bg-primary" style="height: 200px;">
                    <div class="card-body">
                        <h3><i class="fas fa-user-graduate"></i>&nbsp;Principle</h3>
                        <span class="text-light">
                            Principle : {{$principle > 0 ? $principle : 0}}  
                        </span><br class="mb-3">
                        <a href="{{route('admin.principles')}}" class="text-light">View Detail &raquo;</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card mb-3 bg-success" style="height: 200px;">
                    <div class="card-body">
                        <h3><i class="fas fa-user"></i>&nbsp;Admin User</h3>
                        <span class="text-light">
                            Total Users : {{$user > 0 ? $user : 0}}
                        </span><br>
                        <a href="{{route('admin.users')}}" class="text-light">View Detail &raquo;</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card mb-3 bg-warning" style="height: 200px;">
                    <div class="card-body">
                        <h3 class="text-light"><i class="fas fa-users"></i>&nbsp;Advisors</h3>
                        <span class="text-light">
                            Total Advisors : {{$advisor > 0 ? $advisor : 0}}
                        </span><br>
                        <a href="{{route('admin.advisors')}}" class="text-light">View Detail >></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card mb-3 bg-secondary" style="height: 200px;">
                    <div class="card-body">
                        <h3><i class="fas fa-project-diagram"></i>&nbsp;Projects</h3>
                        <span class="text-light">
                            Total Projects : {{$project > 0 ? $project : 0}}
                        </span><br>
                        <a href="{{route('admin.projects')}}" class="text-light">View Detail >></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card mb-3 bg-danger" style="height: 200px;">
                    <div class="card-body">
                        <h3><i class="fas fa-tasks"></i>&nbsp;Subjects</h3>
                        <span class="text-light">
                            Total Subjects : {{$subject > 0 ? $subject : 0}}   
                        </span><br>
                        <a href="{{route('admin.subjects')}}" class="text-light">View Detail &raquo;</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card mb-3 bg-info" style="height: 200px;">
                    <div class="card-body">
                        <h3><i class="fas fa-upload"></i>&nbsp;Publications</h3>
                        <span class="text-light">
                            Total Publications : {{$publication > 0 ? $publication : 0}}
                        </span><br>
                        <a href="{{route('admin.publications')}}" class="text-light">View Detail &raquo;</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card mb-3 bg-info" style="height: 200px;background-color:#305c75!important;">
                    <div class="card-body">
                        <h3><i class="fas fa-images"></i>&nbsp;Events</h3>
                        <span class="text-light">
                            Events : {{$event > 0 ? $event : 0}}
                        </span><br>
                        <a href="{{route('admin.news')}}" class="text-light">View Detail &raquo;</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card mb-3 bg-info" style="height: 200px;background-color:#5e9167!important;">
                    <div class="card-body">
                        <h3><i class="fas fa-users"></i>&nbsp;Active Members</h3>
                        <span class="text-light">
                            Active Members : {{$currentMemberCount > 0 ? $currentMemberCount : 0}}
                        </span><br>
                        <a href="{{route('admin.members')}}" class="text-light">View Detail &raquo;</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card mb-3 bg-info" style="height: 200px;background-color:#adb061!important;">
                    <div class="card-body">
                        <h3><i class="fas fa-users"></i>&nbsp;Former Members</h3>
                        <span class="text-light">
                            Former Members : {{$formerMember > 0 ? $formerMember : 0}}
                        </span><br>
                        <a href="{{route('admin.former_members')}}" class="text-light">View Detail &raquo;</a>
                    </div>
                </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
@section('extra-css')
    <style>
        a{
            text-decoration: none;
        }
    </style>
@endsection