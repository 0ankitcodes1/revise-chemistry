<!DOCTYPE html>
<html lang="en">
<head>
    @include("components.web.header")
    @yield("page-title")
    @livewireStyles
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar-example3" style="position: relative">
    @include("components.web.navbar")

    @yield("content")

    @include("components.web.footer")
    
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
    @yield("script")
</body>
</html>