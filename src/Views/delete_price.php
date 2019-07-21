<form action="/price/delete" method="post" name="price" class="delete_form">
    <h3 id="priceResponseDel"></h3>
    <button type="submit" class="btn btn-danger ">Внести изменения</button>
    <table class="table margin-50">
        <thead class="thead-dark ">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Наименование</th>
            <th scope="col">Цена</th>
            <th scope="col">Категория</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($prices as $price): ?>
            <tr>
                <th><input class="checkbox" type="checkbox" id="<?php echo $price['idprice'] ?>"
                           value="<?php echo $price['idprice'] ?>"></th>
                <td><?php echo $price['title'] ?></td>
                <td><?php echo $price['price'] ?></td>
                <td><?php echo $price['category'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</form>