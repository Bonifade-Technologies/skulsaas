<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css','resources/js/app.js'])

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

        @livewireStyles
        @stack('styles')
    </head>

    <body class="antialiased p-4" x-data="{open:true}">
        <h2 class="text-xl font-medium text-center">Home Page testing</h2>
        <p x-show="open" class="p-3 bg-blue-600 text-white rounded-lg">Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Sunt
            corporis
            modi sequi et quisquam beatae libero
            natus neque accusamus, rerum ipsa expedita deleniti mollitia deserunt ut dolorem alias tenetur? Iure?</p>


        <button @click="open = ! open"
            class="rounded-lg px-4 py-2 text-sm bg-green-500 inline-block my-2 text-white">Toggle text</button>

        <div class="">
            @livewire('counter')
        </div>
        @livewireScripts


        {{-- sweetalert --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // success message
            window.addEventListener('swal:success', function(e) {
              Swal.fire(e.detail);
            });
        
            window.addEventListener('swal:confirm', event => {
              Swal.fire({
                title: 'Are you sure?'
                , text: "You won\'t be able to revert this!"
                , icon: 'question'
                , showCancelButton: true
                , confirmButtonColor: '#0d2364'
                , cancelButtonColor: '#f11'
                , confirmButtonText: 'Yes delete it'
              }).then((result) => {
                if (result.isConfirmed) {
                  Livewire.emit('deleteConfirm');
                  // Swal.fire(
                  //   'Deleted!'
                  //   , 'Your file has been deleted'
                  //   , 'success'
                  // )
                }
              });
            });
        
            $(function() {
              $('[data-toggle="tooltip"]').tooltip()
            })
        
        </script>

        @stack('scripts')
    </body>

</html>