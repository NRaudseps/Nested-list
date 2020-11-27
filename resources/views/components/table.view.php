<table class="table-auto border-2 border-collapse border-gray-300 mt-4 text-2xl">
    <thead class="border">
    <tr>
        <th class="border-2 border-gray-300 px-4 bg-gray-100">id</th>
        <th class="border-2 border-gray-300 px-4 bg-gray-100">name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($sections as $section):?>
        <tr>
            <td class="border-2 border-gray-300 px-3">
                <a href="/section"><?php echo $section['id']; ?></a>
            </td>
            <td class="border-2 border-gray-300 px-3">
                <a href="/section/<?php echo $section['id']?>"><?php echo $section['name']; ?></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<form action="/section/create" method="get">
    <input type="hidden" name="id" value="<?php echo explode('/', $_SERVER['REQUEST_URI'])[2];?>">
    <button class="mt-4 bg-blue-300 py-2 px-2 border border-gray-400 rounded-lg">Create New Section</button>
</form>

