<p id="areaForData"></p>
<div class="comment">
    <h2>Отзывы</h2>
    <hr width="80%">
    <div class="form_for_comment">
        <form action="/comments/add" method="post" name="for_commit" class="for_commit">
            <p> Оставьте свой комментарий</p>
            <p><input class="author_comment" name="author" type="text" placeholder="Ваше имя..."></p>
            <textarea class="formTextarea" name="text" rows="7" cols="60" placeholder="Введите ваш комментарий..."></textarea>
            <p id="areaForError"></p>
            <p id="error">Слишком короткий текст</p>
            <p id="errorAuthor">Короткое имя</p>
            <p id="correctly">Комментарий успешно добавлен</p>
            <p class="text_knopka"  name="text_knopka"><input class="text_knopka" name="knopka" type="submit" value="Отправить"></p>
        </form>
    </div>


    <div class="all_comments">
        <?php $date = array_column($comments, 'date');
        array_multisort($date, SORT_DESC, $comments); ?>
        <?php foreach ($comments as $comment): ?>
            <div id="com">
                <p id="pAut"><?php echo $comment['author']; ?></p>
                <p><?php echo $comment['text']; ?> </p>
                <p id="pTime"><?php echo $comment['date']; ?></p>
            </div>
            <?php if (count($comment) > 5): ?>
                <?php array_splice($comment, 0, 5) ?>
                <?php foreach ($comment as $item):
                    ?>
                    <div id="childCom">
                        <p id="childpAut"><?php echo $item['author']; ?></p>
                        <p><?php echo $item['text']; ?> </p>
                        <p id="childpTime"><?php echo $item['date']; ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        <?php endforeach; ?>
    </div>

</div>


<script src="/js/comment.js"></script>
