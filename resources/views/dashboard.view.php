<?php
require_once 'layouts/header.view.php';
?>

<?php if(isset($_SESSION['username'])): ?>

<div class="h-screen p-8">
    <h1 class="text-4xl">
        Hello, <?php echo ucwords($_SESSION['username']); ?>
    </h1>

    <?php require_once 'components/table.view.php'; ?>

</div>

<?php endif; ?>


<?php
require_once 'layouts/footer.view.php';
?>
