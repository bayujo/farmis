<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>FARMIS</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  </head>
  <body>
    @yield('content')
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/datepicker.js"></script>
    <script src="https://kit.fontawesome.com/f6cf9a2499.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(function() {
        $('.something').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0; 
            var id = $(this).data('id'); 
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });
            Toast.fire({
            type: 'success',
            title: 'Berhasil mengubah status'
});
            
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/penjaga/penjadwalan/status',
                data: {'status': status, 'id': id},
                success: function(data){
                console.log(data.success)
                }
            });
        })
    })
    </script>
    <script type="text/javascript">
      $('.show_confirm').click(function(event) {
           var form =  $(this).closest("form");
           var name = $(this).data("name");
           event.preventDefault();
           Swal.fire({
            title: 'Apakah anda yakin ingin menghapus data ini?',
            text: "Data akan hilang selamanya setelah dihapus",
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus'
           })
           .then((willDelete) => {
             if (willDelete.isConfirmed) {
               form.submit();
             }
           });
       });
    </script>
  </body>
</html>