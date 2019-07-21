<h3 id="result"></h3>
<form method="post" action="/price/add"  name="for_add_price">
    <h3 class="form-group" id="areaForDataPrice"></h3>
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
        <label for="title">Наименование</label>
        <textarea class="form-control р-25" id="title" name="title" placeholder="наименование" maxlength="100" required></textarea>
    </div>
    <div class="form-group" id="error1">
        <p>Слишком короткое наименование</p>
    </div>
    <div class="form-group">
        <label for="price">Стоимость</label>
        <textarea class="form-control w-25" style="height: 40px " id="price" name="price" placeholder="стоимость" maxlength="10" required></textarea>
    </div>
    <div class="form-group" id="error2">
        <p>Некорректная стоимость</p>
    </div>
    <button type="submit" class="btn btn-secondary">Добавить</button>
</form>
<script src="/js/addprice.js"></script>