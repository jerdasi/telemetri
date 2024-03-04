<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>@yield("title")</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=Nunito"
            rel="stylesheet"
        />

        <!-- Scripts -->
        @vite(["resources/sass/app.scss", "resources/js/app.js"])
    </head>
    <body>
        <div
            class="page-wrapper"
            data-header-position="fixed"
            data-layout="vertical"
            data-navbarbg="skin6"
            data-sidebar-position="fixed"
            data-sidebartype="full"
            id="main-wrapper"
        >
            @include("layouts.sidebar")

            <div class="body-wrapper">
                @include("layouts.header")
                @yield("content")
                {{-- @include('layouts.footer') --}}
            </div>
        </div>
        @stack("script")
    </body>
</html>
