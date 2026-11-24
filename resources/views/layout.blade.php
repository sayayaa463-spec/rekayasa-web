<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Rekayasa Web</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 24px 40px;
        }
        table {
            width: 75%;
            border-collapse: collapse;
            margin-top: 12px;
        }
        th, td {
            border: 1px solid #444;
            padding: 10px 14px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        input, select, textarea, button {
            padding: 6px 10px;
            margin-top: 4px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="/products">Products</a> |
        <a href="/stocks">Stocks</a> |
        <a href="/transactions">Transactions</a>
    </nav>
    <hr>

    @yield('content')
</body>
</html>