<form action="/recommendation/delete" method="post" name="recommendation" class="delete_form">
    <h3 id="recommendationResponseDel"></h3>
    <button type="submit" class="btn btn-danger ">Внести изменения</button>
    <table class="table margin-50">
        <thead class="thead-dark ">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Содержание совета</th>
            <th scope="col">Дата</th>
            <th scope="col">Автор</th>
        </tr>
        </thead>
        <tbody>
        <?php rsort($recommendations); ?>
        <?php foreach ($recommendations as $recommendation): ?>
            <tr>
                <th><input class="checkbox" type="checkbox" id="<?php echo $recommendation['idrecommendation'] ?>"
                           value="<?php echo $recommendation['idrecommendation'] ?>"></th>
                <td  class="long_text_cont"><?php echo $recommendation['recommendation'] ?></td>
                <td><?php echo $recommendation['date'] ?></td>
                <td><?php echo $recommendation['author'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</form>