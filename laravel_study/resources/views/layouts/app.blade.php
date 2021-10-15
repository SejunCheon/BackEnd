<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main id="app">
                {{ $slot }}  {{-- 사용자가 작성한 부분은 이곳에 들어간다 --}}
            </main>
        </div>
        <script>
            @if(session('success'))
                showSuccessMsg();
            @endif
            function confirmDelete(e) {
              myform = document.getElementById('form');
              flag = confirm('정말 삭제하시겠습니까?');
              if(flag){
                myform.submit();
              }
            }

            function deleteImage(id) {
            if(confirm('정말로 프로필 사진을 삭제하시겠습니까?') == true) {
              editForm = document.getElementById('editForm');
              // editForm.delete('_method');
              editForm._method.value = 'delete';
              editForm.action = '/posts/images/'+id;
              editForm.submit();
            }
            return false;
          }
        function showSuccessMsg() {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '글이 성공적으로 등록되었습니다',
                showConfirmButton: false,
                timer: 1500
            })
        }
          </script>
    </body>
</html>
