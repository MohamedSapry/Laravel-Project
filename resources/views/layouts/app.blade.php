
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
        <livewire:user-table-self-impl>
        @livewireScripts
    </body>
</html>