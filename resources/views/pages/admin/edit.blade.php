@extends('layouts.admin')
@if (Request::path())
    @php
        $pageBlog = explode('/dashboard/manage-blog/', Request::path());
        $pageNote = explode('/dashboard/manage-note/', Request::path());
        $pageMcq = explode('/dashboard/manage-mcq/', Request::path());
        $pageVideo = explode('/dashboard/manage-videos/', Request::path());
    @endphp
    @if (count($pageBlog) > 1)
        @section('page-title')
            <title>Admin Panel : Edit Blog</title>
        @stop
        @section('content')
            <livewire:edit-blog-post-livewire-component :postid=$pageBlog[1] />
            <br>
            <br>
        @stop
    @elseif (count($pageNote) > 1)
        @section('page-title')
            <title>Admin Panel : Edit Note</title>
        @stop
        @section('content')
            <livewire:edit-note-livewire-component :noteid=$pageNote[1] />
            <br>
            <br>
        @stop
    @elseif (count($pageMcq) > 1)
        @section('page-title')
            <title>Admin Panel : Edit Mcq</title>
        @stop
        @section('content')
            <livewire:edit-mcq-livewire-component :mcqid=$pageMcq[1] />
            <br>
            <br>
        @stop
    @elseif (count($pageVideo) > 1)
        @section('page-title')
            <title>Admin Panel : Edit Video</title>
        @stop
        @section('content')
            <livewire:edit-video-livewire-component :videoid=$pageVideo[1] />
            <br>
            <br>
        @stop
    @else
    @endif
@else
@endif
