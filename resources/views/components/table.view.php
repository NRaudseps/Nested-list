<table class="table-fixed border-collapse border-gray-300 mt-4 text-2xl">
    <thead>
    <tr>
        <th class="border-2 border-gray-300 px-4 bg-gray-100">id</th>
        <th class="border-2 border-gray-300 px-4 bg-gray-100">name</th>
        <th class="border-2 border-gray-300 px-4 bg-gray-100">description</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($sections as $index => $section):?>
        <tr>
            <td class="border-2 border-gray-300 px-3">
                <a href="/section"><?php echo $index + 1; ?></a>
            </td>
            <td class="border-2 border-gray-300 px-3">
                <a href="/section/<?php echo $section['id']?>"><?php echo $section['name']; ?></a>
            </td>
            <td class="border-2 border-gray-300 px-3">
                <a href="/section/<?php echo $section['id']?>"><?php echo $section['description']; ?></a>
            </td>
            <?php require 'buttons.view.php'; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>

</table>
<?php if(empty($sections)): ?>
    <div class="h-8"></div>
<?php endif; ?>

<form action="/section/create" method="get">
    <input type="hidden" name="parent_id" value="<?php echo $id?>">
    <button class="mt-4 bg-blue-300 hover:bg-blue-500 py-2 px-2 border border-gray-400 rounded-lg text-2xl">
        Create New Section
    </button>
</form>

