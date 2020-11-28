<?php
require_once './resources/views/layouts/header.view.php';
?>

<div class="h-screen -mt-20 flex justify-center items-center flex-col">
    <h1 class="text-8xl mb-4"><?php echo $appName;?> Demo</h1>
    <?php if (!can()): ?>
        <div class="w-1/2 flex justify-around text-xl">
            <a href="/login">Login</a >
            <a href="/register">Register</a >
        </div>
    <?php endif; ?>
</div>

<?php
require_once './resources/views/layouts/footer.view.php';
?>