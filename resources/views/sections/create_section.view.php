<?php
require_once './resources/views/layouts/header.view.php';
?>

<div class="p-4 mt-4 ml-4 border border-gray-300 rounded shadow-md inline-block">
    <form action="/section/create" method="post">
        <input type="hidden" name="parent_id" value="<?php echo htmlspecialchars($_GET['parent_id']); ?>">

        <label for="name">Enter The Name</label><br>
        <input type="text" name="name" required class="mb-2 border border-gray-300"><br>
        <label for="description">Enter The Description</label><br>
        <input type="text" name="description" required class="mb-4 border border-gray-300"><br>

        <?php require './resources/views/components/blue-button.view.php'; ?>
    </form>
</div>

<?php
require_once './resources/views/layouts/footer.view.php';
?>
