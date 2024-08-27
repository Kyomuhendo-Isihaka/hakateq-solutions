@extends('hakateq_admin.layouts.app')

@section('content')

<div class="dashboard-contet">


    <!-- Top Stats -->
    <div class="dashboard-row">
        <div class="stat-box w3-animate-left">
            <i class="fa fa-users"></i>

        <h3>{{$teamMemberCount}}</h3>
            <p>Team Members</p>
        </div>
        <div class="stat-box w3-animate-left">
            <i class="fa fa-book"></i>
            <h3>{{$blogCount}}</h3>
            <p>Blogs</p>
        </div>
        <div class="stat-box w3-animate-left">
            <i class="fa fa-tasks"></i>
            <h3>{{$serviceCount}}</h3>
            <p>Services</p>
        </div>
        <div class="stat-box w3-animate-left">
            <i class="fa fa-phone"></i>
            <h3>{{$contactCount}}</h3>
            <p>Contacts</p>
        </div>
    </div>

    <!-- Recent Activities and Shortcuts -->
    <div class="dashboard-row">
        <!-- Recent Activities -->
        <div class="recent-activities w3-animate-right">
            {{-- <h4>Recent Activities</h4>
            <div class="activity-item">
                <p><strong>John Doe</strong> enrolled in <strong>Python Basics</strong></p>
                <small>2 hours ago</small>
            </div>
            <div class="activity-item">
                <p><strong>Jane Smith</strong> completed <strong>JavaScript Course</strong></p>
                <small>5 hours ago</small>
            </div>
            <div class="activity-item">
                <p><strong>Mark Brown</strong> joined the <strong>Web Development Bootcamp</strong></p>
                <small>1 day ago</small>
            </div>
            <div class="activity-item">
                <p><strong>Emily Clark</strong> submitted the <strong>Final Project</strong></p>
                <small>2 days ago</small>
            </div> --}}
        </div>

        <!-- Shortcuts -->
        <div class="shortcut-links w3-animate-right">
            <h4>Quick Shortcuts</h4>
            <div class="shortcut-item">
                <a href="{{route('services.index')}}"  style="text-decoration: none"><i class="fa fa-tasks"></i> Services</a>
            </div>
            <div class="shortcut-item">
                <a href="{{route('blogs.index')}}"  style="text-decoration: none"><i class="fa fa-book"></i> Blogs</a>
            </div>
            <div class="shortcut-item">
                <a href="{{route('contacts')}}"  style="text-decoration: none"><i class="fa fa-phone"></i> Contacts</a>
            </div>

        </div>
    </div>

</div>
@endsection
