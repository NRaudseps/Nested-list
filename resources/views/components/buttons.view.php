<td>
    <table>
        <tbody>
        <tr>
            <td>
                <div class="flex p-2">
                    <form action="/section/edit" method="get">
                        <input type="hidden" name="id" value="<?php echo $section['id']; ?>">
                        <input type="hidden" name="redirect_id" value="<?php echo explode('/', $_SERVER['REQUEST_URI'])[2];?>">
                        <button class="mr-2 bg-green-400 py-2 px-2 border border-gray-400 rounded-lg">
                            Edit
                            Section
                        </button>
                    </form>
                    <form action="/section/delete" method="post">
                        <input type="hidden" name="id" value="<?php echo $section['id']; ?>">
                        <input type="hidden" name="redirect_id" value="<?php echo explode('/', $_SERVER['REQUEST_URI'])[2];?>">
                        <button class="bg-red-400 py-2 px-2 border border-gray-400 rounded-lg">Delete
                            Section
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</td>