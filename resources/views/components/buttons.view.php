<td>
    <table>
        <tbody>
        <tr>
            <td>
                <div class="flex p-2">
                    <form action="/section/<?php echo $section['id']; ?>/edit" method="get">
                        <input type="hidden" name="parent_id" value="<?php echo $id ?>">
                        <button class="mr-2 bg-green-400 hover:bg-green-500 py-2 px-2 border border-gray-400 rounded-lg">
                            Edit
                            Section
                        </button>
                    </form>
                    <form action="/section/<?php echo $section['id']; ?>/delete" method="post">
                        <input type="hidden" name="parent_id" value="<?php echo $id ?>">
                        <button class="bg-red-400 hover:bg-red-500 py-2 px-2 border border-gray-400 rounded-lg">Delete
                            Section
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</td>