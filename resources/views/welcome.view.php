<?php
require_once 'layouts/header.view.php';
?>

<div class="h-screen -mt-20 flex justify-center items-center flex-col">
    <h1 class="text-8xl mb-4">Nested List Demo</h1>
    <?php if (empty($_SESSION)): ?>
        <div class="w-1/2 flex justify-around text-xl">
            <a href="/login">Login</a >
            <a href="/register">Register</a >
        </div>
    <?php endif; ?>
</div>

<?php
require_once 'layouts/footer.view.php';
?>