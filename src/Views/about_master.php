<h3 id="result"></h3>
<form method="post" action="/user/addinfo" enctype="multipart/form-data" name="for_add_about_info">
    <h3 class="form-group" id="areaForData">
    </h3>
    <div class="form-group">
        <div class="form-group">
            <label for="about_text">Введите информацию о себе</label>
            <?php if (isset($aboutInfo)): ?>
                <textarea class="form-control" style="height: 200px" id="about_text" name="about_text" placeholder="начните ввод..."
                          required><?php echo $aboutInfo['aboutinfo']; ?></textarea>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="add_picture">Добавить дополнительные изображения (сертификаты и т.д.)</label>
            <p><input id="add_picture" type="file" name="picture[]" multiple accept="image/*"></p>
        </div>
    </div>
    <button type="submit" class="btn btn-secondary">Добавить</button>
</form>

<?php if (isset($aboutPic)): ?>
    <form action="/user/deletemaspic" method="post" name="aboutmaster" class="delete_form ">
        <div class="form-group row margin-50">
            <?php foreach ($aboutPic as $item): ?>
                <div class="col-5 margin-50">
                    <input class="form-check-input checkbox" type="checkbox" value="<?php echo $item['idmasterpic'] ?>"
                           name="delete_master_pic" id="<?php echo $item['idmasterpic'] ?>">
                    <img class="col" src="/../img/<?php echo $item['img'] ?>">
                </div>
            <?php endforeach; ?>
        </div>
        <p>Будут удалены только отмеченные изображения</p>
        <p id="aboutmasterResponseDel"></p>
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
<?php endif; ?>

<script src="/js/about_info.js"></script>
