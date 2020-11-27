<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nested List</title>
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']?>/public/app.css">
</head>
<body class="font-mono">

<?php if(empty($_SESSION)): ?>
    <div class="flex justify-between items-center bg-blue-300 w-full h-20 px-5">
        <a href="/" class="text-3xl">Nested Link</a>
        <div class="flex justify-around w-60">
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        </div>
    </div>
<?php else: ?>
    <div class="flex justify-between items-center bg-blue-300 w-full h-20 px-5">
        <a href="/" class="text-3xl">Nested Link</a>
        <div class="flex justify-around w-60">
            <a href="/dashboard">Dashboard</a>
            <form action="/logout" method="post">
                <button>Logout</button>
            </form>
        </div>
    </div>
<?php endif; ?>

