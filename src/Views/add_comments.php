<h3 id="areaForData"></h3>
<div class="comment">

    <?php arsort($comments); ?>
    <?php foreach ($comments as $comment): ?>
        <div id="com" class="d-flex flex-column border">
            <div class="p-2">
                <p><?php echo $comment['text']; ?> </p>
                <p id="pTime"><?php echo $comment['date']; ?></p>
                <button name="<?php echo $comment['idcomment']; ?>" type="button" class="btn btn-secondary btn_get_id"
                        data-toggle="modal" data-target="#addcomment">Ответить
                </button>
            </div>
        </div>

        <form id="<?php echo $comment['idcomment']; ?>" class="comment_master" action="/comments/addMaster" method="post">
            <div class="form-group">
                <h4 id="<?php echo $comment['idcomment']; ?>responseArea" ></h4>
                <label for="comment">Поле ввода текста</label>
                <textarea id="comment" class="form-control" required rows="4" name="textMCom"
                          placeholder="введите ваш ответ..."></textarea>
            </div>
            <div class="form-group"><p style="display: none" id="<?php echo $comment['idcomment']; ?>errorArea" >Слишком короткий текст</p></div>
            <button id="button" class="btn btn-success w-25" type="submit">Отправить</button>
            <button id="button" class=" btn btn-dark w-25" name="closes" >Отмена</button>
        </form>
    <?php endforeach; ?>


</div>