<?php
require_once './resources/views/layouts/header.view.php';
?>

<?php if(can()): ?>
<div class="h-screen p-8">
    <h1 class="text-4xl">
        Hello, <?php echo ucwords($username); ?>
    </h1>

    <?php require_once 'components/table.view.php'; ?>

</div>
<?php endif; ?>


<?php
require_once './resources/views/layouts/footer.view.php';
?>
