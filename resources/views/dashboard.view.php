<?php
require_once 'layouts/header.view.php';
?>

<div class="h-screen -mt-20 flex justify-center items-center flex-col">
    <h1 class="text-6xl">
        <?php if(isset($_SESSION['username'])): ?>
            Hello, <?php echo ucwords($_SESSION['username']); ?>
        <?php endif; ?>
    </h1>
</div>

<?php
require_once 'layouts/footer.view.php';
?>
