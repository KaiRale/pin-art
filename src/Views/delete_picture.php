<form action="/picture/delete" method="post" name="picture" class="delete_form">
    <h3 id="pictureResponseDel"></h3>
    <button type="submit" class="btn btn-danger ">Внести изменения</button>
    <table class="table margin-50">
        <thead class="thead-dark ">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Изображение</th>
            <th scope="col">Описание</th>
            <th scope="col">Категория</th>
        </tr>
        </thead>
        <tbody>
        <?php rsort($pictures); ?>
        <?php foreach ($pictures as $picture): ?>
            <tr>
                <th><input class="checkbox" type="checkbox" id="<?php echo $picture['idpicture'] ?>"
                           value="<?php echo $picture['idpicture'] ?>"></th>
                <th scope="row"><img class="delete_picture_img" src="/../img/<?php echo $picture['img'] ?>"></th>
                <td><?php echo $picture['description'] ?></td>
                <td><?php echo $picture['name'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</form>