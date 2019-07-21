


<form method="post" action="/picture/add" enctype="multipart/form-data" name="for_add_picture">
    <h3 id="areaForAddPicture"></h3>
    <div class="form-group">
        <label for="category">Выберите категорию</label>
        <select class="form-control" id="category" name="category" required>
            <?php var_dump($categorys) ?>
            <?php foreach ($categorys as $category): ?>
                <option value="<?php echo $category['idcategory']; ?>"><?php echo $category['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Описание(по желанию)</label>
        <textarea class="form-control" id="description" name="description" placeholder="описание"></textarea>
    </div>
    <div class="form-group">
        <label for="img">Загрузите фотографию</label>
        <input type="file" id="img" name="img" accept="image/*" required>
    </div>

    <button type="submit" class="btn btn-secondary">Добавить</button>
</form>
<script src="/js/add_picture.js"></script>