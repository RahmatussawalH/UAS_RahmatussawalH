<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-Book - @yield('title')</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background-color: #f4f7f6;
            color: #333;
        }
        .container {
            max-width: 960px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2c3e50;
            margin-bottom: 25px;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        /* Navbar Styles */
        nav {
            background-color: #2c3e50; /* Darker blue/grey */
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .navbar-brand {
            font-size: 26px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }
        .navbar-brand a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .navbar-brand a:hover {
            color: #f1c40f; /* Amber/yellow on hover */
        }
        .navbar-nav {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .navbar-nav li {
            margin-left: 25px;
        }
        .navbar-nav a {
            color: white;
            text-decoration: none;
            font-size: 17px;
            padding: 5px 0;
            position: relative;
            transition: color 0.3s ease;
        }
        .navbar-nav a:hover {
            color: #f1c40f;
        }
        .navbar-nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: #f1c40f;
            left: 0;
            bottom: -5px;
            transition: width 0.3s ease;
        }
        .navbar-nav a:hover::after {
            width: 100%;
        }

        /* Utility classes for buttons and alerts */
        .btn {
            padding: 10px 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px; /* Added spacing */
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn-primary { background-color: #3498db; color: white; }
        .btn-primary:hover { background-color: #2980b9; transform: translateY(-1px); }
        .btn-success { background-color: #2ecc71; color: white; }
        .btn-success:hover { background-color: #27ae60; transform: translateY(-1px); }
        .btn-danger { background-color: #e74c3c; color: white; }
        .btn-danger:hover { background-color: #c0392b; transform: translateY(-1px); }
        .btn-secondary { background-color: #95a5a6; color: white; }
        .btn-secondary:hover { background-color: #7f8c8d; transform: translateY(-1px); }

        .alert {
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden; /* For rounded corners */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: #f0f3f5; /* Light grey header */
            color: #555;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
        }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f1f1f1; }

        /* Form Styles */
        form {
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="number"] {
            width: calc(100% - 20px); /* Adjust for padding */
            padding: 12px 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }
        .error {
            color: #e74c3c;
            font-size: 0.9em;
            margin-top: -15px; /* Pull error message closer to input */
            margin-bottom: 15px;
            display: block;
        }
    </style>
</head>
<body>
    <nav>
        <div class="navbar-brand">
            <a href="{{ route('books.index') }}">E-Book</a>
        </div>
        <ul class="navbar-nav">
            <li><a href="{{ route('books.index') }}" class="{{ request()->routeIs('books.index') ? 'active' : '' }}">Daftar Buku</a></li>
            <li><a href="{{ route('books.create') }}" class="{{ request()->routeIs('books.create') ? 'active' : '' }}">Tambah Buku</a></li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer style="background:#2c3e50;color:white;padding:18px 0;text-align:center;margin-top:40px;">
        <div>
            &copy; {{ date('Y') }} <a href="{{ route('books.index') }}" style="color:#f1c40f;text-decoration:none;">e-Book</a> &mdash; All rights reserved. By Rahmatussawal Hidayat
        </div>
    </footer>
</body>
</html>
