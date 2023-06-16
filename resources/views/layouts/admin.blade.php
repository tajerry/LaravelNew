<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@section('title') - Админ панель GeekBrains @show</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('css/vendor.bundle.addons.css')}}">

    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/style1.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />


</head>
<x-admin.header></x-admin.header>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <x-admin.sidebar></x-admin.sidebar>

        <!-- partial -->

        <div class="main-panel">
            <div class="container-fluid clearfix ">
                @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <x-admin.footer></x-admin.footer>

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Подключаем плагин Popper (необходим для работы компонента Dropdown и др.) -->
<script src="js/popper.min.js"></script>
<!-- Подключаем Bootstrap JS -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
