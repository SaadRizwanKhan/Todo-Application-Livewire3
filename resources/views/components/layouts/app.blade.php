<!DOCTYPE html>
<html lang="en">

@include('components.header')

<body>

    @include('components.nav')

    <div class="container-fluid">
        {{ $slot }}
    </div>

    @include('components.footer')
    <script>

        window.addEventListener('alert', event => { 
            toastr[event.detail.type](event.detail.message, 
            event.detail.title ?? ''), toastr.options = {
                   "closeButton": true,
                   "progressBar": true,
               }
           });
        
        </script>
        
          
</body>

</html>