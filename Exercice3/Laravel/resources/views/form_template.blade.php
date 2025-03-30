<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset="UTF-8">
</head>
<style>
    body {
        background-color: rgb(94, 88, 88);
    }

    * :not(input) {
        font-size: 20px;
        font-family: 'Courier New', Courier, monospace;
        color: white;
    }
    input[type="submit"] {
        background-color: rgb(24, 15, 15);
        color: white;
        border: 1px solid white;
        padding: 10px;
        border-radius: 5px;
    }

    td {
        padding: 15px;
    }



</style>

<body>
    @yield('contenu')
</body>

</html>