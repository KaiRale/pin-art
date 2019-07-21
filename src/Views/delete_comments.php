<form action="/comments/delete" method="post" name="comment" class="delete_form">
    <h3 id="commentResponseDel"></h3>
    <button type="submit" class="btn btn-danger ">Внести изменения</button>
    <table class="table margin-50">
        <thead class="thead-dark ">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Комментарий</th>
            <th scope="col">Автор</th>
            <th scope="col">Дата</th>
        </tr>
        </thead>
        <tbody>
        <?php rsort($comments); ?>
        <?php foreach ($comments as $comment): ?>
            <tr>
                <th><input class="checkbox" type="checkbox" id="<?php echo $comment['idcomment'] ?>"
                           value="<?php echo $comment['idcomment'] ?>"></th>
                <td  class="long_text_cont"><?php echo $comment['text'] ?></td>
                <td><?php echo $comment['author'] ?></td>
                <td><?php echo $comment['date'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</form>