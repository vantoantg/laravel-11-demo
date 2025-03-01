<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel - CodeTutHub</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<h2>Ví dụ mã vạch</h2>
<p>Mã vạch EAN-13:</p>
{!! DNS1D::getBarcodeHTML('123456789012', 'EAN13') !!}

<p>Mã QR Code:</p>
{!! DNS2D::getBarcodeHTML('https://codetuthub.com', 'QRCODE') !!}
</body>
</html>
