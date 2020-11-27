<?php
require_once 'layouts/header.view.php';
?>

    <form action="/section/create" method="post">
        <label for="name">Enter The Section </label><br>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']);?>">
        <input type="text" name="name" required class="border border-gray-300"><br>
        <button type="submit">Submit!</button>
    </form>

<?php
require_once 'layouts/footer.view.php';
?>
