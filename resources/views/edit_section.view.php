<?php
require_once 'layouts/header.view.php';
?>

<form action="/section/edit" method="post">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']);?>">
    <input type="hidden" name="redirect_id" value="<?php echo explode('/', $_SERVER['REQUEST_URI'])[2];?>">

    <label for="name">Edit The Name</label><br>
    <input type="text" name="name" required class="border border-gray-300"><br>
    <label for="description">Edit The Description</label><br>
    <input type="text" name="description" required class="border border-gray-300"><br>

    <button type="submit">Submit!</button>
</form>

<?php
require_once 'layouts/footer.view.php';
?>
