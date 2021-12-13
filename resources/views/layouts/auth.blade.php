<!DOCTYPE html>
<html lang="en">

<head>
    @include("components.admin.header")
    @yield("page-title")
    @livewireStyles
</head>

<body class="bg-light">
    <div class="container-fluid">
        @yield("content")
    </div>

    @include("components.admin.footer")

    @livewireScripts
    <script src="{{ asset('js/ckeditor5/build/ckeditor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield("script")
</body>

</html>
