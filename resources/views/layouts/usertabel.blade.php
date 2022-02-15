<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Users</title>

        <style>

            td{
                border: 1px groove #e2e2e2;
                border-spacing: 0;
                
            }
            tr, td{
                padding: 16px;
            }
            table{
                border-collapse: collapse;
            }
            .center {
                margin-left: auto;
                margin-right: auto;
            }

        </style>

        @livewireStyles
    </head>
    <body>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
        </form>
    </div>
        <livewire:user-table-self-impl>
        @livewireScripts
    </body>
</html>