@extends('layouts.admin')
@if (Request::path())
    @php $page = explode('/dashboard/', Request::path())[1] @endphp

    @if ($page == 'manage-student')
        @section('page-title')
            <title>Admin Panel : Manage Student Section</title>
        @stop
        @section('content')
            <livewire:manage-student-livewire-component />
        @stop
    @elseif ($page == 'manage-student-reports')
        @section('page-title')
            <title>Admin Panel : Manage Student Reports Section</title>
        @stop
        @section('content')
            <livewire:manage-student-report-livewire-component />
        @stop
    @elseif ($page == 'add-blog')
        @section('page-title')
            <title>Admin Panel : Add Blog Post</title>
        @stop
        @section('content')
            <livewire:post-blog-livewire-component />
        @stop
    @elseif ($page == 'manage-blog')
        @section('page-title')
            <title>Admin Panel : Manage Blog Post</title>
        @stop
        @section('content')
            <livewire:manage-blog-livewire-component />
        @stop
    @elseif ($page == 'add-note')
        @section('page-title')
            <title>Admin Panel : Add Notes</title>
        @stop
        @section('content')
            <livewire:post-note-livewire-component />
        @stop
    @elseif ($page == 'manage-note')
        @section('page-title')
            <title>Admin Panel : Manage Notes</title>
        @stop
        @section('content')
            <livewire:manage-note-livewire-component />
        @stop
    @elseif ($page == 'add-videos')
        @section('page-title')
            <title>Admin Panel : Post Chapter Videos</title>
        @stop
        @section('content')
            <livewire:post-video-livewire-component />
        @stop
    @elseif ($page == 'manage-videos')
        @section('page-title')
            <title>Admin Panel : Manage Chapter Videos</title>
        @stop
        @section('content')
            <livewire:manage-video-livewire-component />
        @stop
    @elseif ($page == 'add-mcq')
        @section('page-title')
            <title>Admin Panel : Add Mcq</title>
        @stop
        @section('content')
            <livewire:post-mcq-livewire-component />
        @stop
    @elseif ($page == 'manage-mcq')
        @section('page-title')
            <title>Admin Panel : Manage Mcq</title>
        @stop
        @section('content')
            <livewire:manage-mcq-livewire-component />
        @stop
    @elseif ($page == 'website-settings')
        @section('page-title')
            <title>Admin Panel : Website Settings</title>
        @stop
        @section('content')
            <livewire:website-settings-livewire-component />
        @stop
    @elseif ($page == 'profile-settings')
        @section('page-title')
            <title>Admin Panel : Profile Settings</title>
        @stop
        @section('content')
            <livewire:edit-personal-details-livewire-component :userid=1 :userrole=0 />
        @stop
    @elseif ($page == 'change-password')
        @section('page-title')
            <title>Admin Panel : Change Password</title>
        @stop
        @section('content')
            <livewire:change-password-livewire-component :userid=1 :userrole=0 />
        @stop
    @elseif ($page == 'manage-contact')
        @section('page-title')
            <title>Admin Panel : Manage Contact</title>
        @stop
        @section('content')
            <livewire:manage-contact-livewire-component />
        @stop
    @else
    @endif
@else
@endif
