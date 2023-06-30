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
        @vite(['resources/css/app.css','resources/scss/main.scss', 'resources/js/app.js'])

        @livewireStyles
        @stack('styles')
    </head>

    <body class="antialiased  p-4" x-data="{open:true}">
        <h2 class="text-xl font-medium text-center">Home Page testing</h2>
        <p x-show="open" class="p-3 bg-blue-600 text-white rounded-lg font-roboto">Lorem ipsum dolor sit amet
            consectetur
            adipisicing elit. Sunt
            corporis
            modi sequi et quisquam beatae libero
            natus neque accusamus, rerum ipsa expedita deleniti mollitia deserunt ut dolorem alias tenetur? Iure?</p>


        <button @click="open = ! open"
            class="rounded-lg px-4 py-2 font-ubuntu font-medium text-sm bg-green-500 inline-block my-2 text-white">Toggle
            text
            <span><i class="fa-brands fa-facebook fa-2x"></i></span>
        </button>
        <p class="flex space-x-4">
            <i class="fa-sharp fa-light fa-book fa-2x"></i>
            <i class="fa-light fa-book"></i>
            <span class="text-lg bg-red-500 rounded-full p-2 aspect-square">
                <i class="fa-regular fa-book-open-reader"></i>
            </span>
        </p>

        <img src="{{ Vite::asset('resources/svgs/linkedin.svg') }}" alt="ok done">
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