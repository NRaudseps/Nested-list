<?php
require_once 'layouts/header.view.php';
?>

    <form action="/section/create" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']);?>">

        <label for="name">Enter The Name</label><br>
        <input type="text" name="name" required class="border border-gray-300"><br>
        <label for="description">Enter The Description</label><br>
        <input type="text" name="description" required class="border border-gray-300"><br>

        <button type="submit">Submit!</button>
    </form>

<?php
require_once 'layouts/footer.view.php';
?>
