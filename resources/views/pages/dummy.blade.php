@extends('layouts.admin')
@section('page-title')
<title>Just For Testing</title>
@stop
@section('content')
<div class="container">
    {{-- <livewire:post-blog-livewire-component />
    <livewire:manage-blog-livewire-component />
    <livewire:edit-blog-post-livewire-component :postid=1 /> --}}

    {{-- <livewire:post-note-livewire-component />
    <livewire:manage-note-livewire-component />
    <livewire:edit-note-livewire-component :noteid=1 /> --}}

    {{-- <livewire:post-video-livewire-component />
    <livewire:manage-video-livewire-component />
    <livewire:edit-video-livewire-component :videoid=1 /> --}}

    {{-- <livewire:post-mcq-livewire-component />
    <livewire:manage-mcq-livewire-component /> --}}
    <livewire:edit-mcq-livewire-component :mcqid=3 />

    {{-- <livewire:edit-personal-details-livewire-component :userid=1 :userrole=0 />
    <livewire:change-password-livewire-component :userid=1 :userrole=0 /> --}}

    {{-- <livewire:manage-contact-livewire-component /> --}}
</div>
@stop