<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pemesanan Tiket Kapal</title>

    ```
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        .sidebar a {
            display: block;
            text-decoration: none;
            color: #cbd5e1;
            padding: 13px 15px;
            border-radius: 14px;
            margin-bottom: 8px;
            transition: all .3s ease;
            font-weight: 500;
        }

        .sidebar a:hover {
            background: #2563eb;
            color: white;
            transform: translateX(5px);
        }

        .active-menu {
            background: #2563eb;
            color: white !important;
            box-shadow: 0 6px 15px rgba(37, 99, 235, .35);
        }

        .sidebar a i {
            width: 28px;
        }


        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f8fafc;
            margin: 0;
        }

        /* SIDEBAR */

        .sidebar {
            width: 260px;
            height: 100vh;
            background: #0f172a;
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px;
            color: white;
            overflow-y: auto;
        }

        .sidebar h4 {
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }

        .sidebar a {
            display: block;
            text-decoration: none;
            color: #cbd5e1;
            padding: 12px 15px;
            border-radius: 12px;
            margin-bottom: 8px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #2563eb;
            color: white;
        }

        .sidebar a i {
            width: 25px;
        }

        /* CONTENT */

        .content {
            margin-left: 260px;
            padding: 25px;
        }

        /* TOPBAR */

        .topbar {
            background: white;
            border-radius: 18px;
            padding: 15px 20px;
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .05);
        }

        /* CARD */

        .card-custom {
            border: none;
            border-radius: 18px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, .06);
        }

        /* TABLE */

        .table {
            vertical-align: middle;
        }

        .table thead {
            background: #f1f5f9;
        }

        /* BUTTON */

        .btn {
            border-radius: 10px;
        }

        /* SCROLLBAR */

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 20px;
        }
    </style>
    ```

</head>

<body>

    ```
    @include('partials.sidebar')

    <div class="content">

        @include('partials.navbar')

        @yield('content')

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    ```

</body>

</html>