<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="public/app.css">
</head>
<body>

<div class="font-mono h-screen flex justify-center items-center bg-gray-200">
    <div class="h-64 w-1/5 border border-gray-300 rounded-lg shadow shadow-lg bg-white">
        <h3 class="text-3xl flex justify-center py-4">Login</h3>

        <form action="#" method="post" class="h-full px-4">
            <label for="email">Enter Your Email Address</label>
            <input
                    type="email"
                    name="email"
                    placeholder="email"
                    required
                    class="mb-2 border border-gray-300 rounded w-full"
            ><br>
            <label for="password">Enter Your Password</label>
            <input
                    type="password"
                    name="password"
                    placeholder="password"
                    required
                    class="mb-2 border border-gray-300 rounded w-full"
            ><br>
            <div class="flex items-center justify-between mt-4">
                <?php require 'resources/views/components/blue-button.view.php' ?>
                <a href="/" class="mr-2">Back</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>