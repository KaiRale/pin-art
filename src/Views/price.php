<div class="price">
    <h2>Услуги и цены</h2>
    <hr width="80%">
    <div class="pic-flex">
        <?php foreach ($pictures as $key => $picture): ?>
            <div class="divimg">
                <img class="pic" src="/img/<?php echo $picture['img']; ?>" alt="перейти в галлерею">
                <span><p><?php echo $key; ?></p></span>
            </div>

        <?php endforeach; ?>

    </div>
    <?php foreach ($prices as $key=>$values): ?>
        <h3 class="category"><?php echo $key ?></h3>
        <table class="price_table">
            <?php foreach ($values as $value): ?>
            <tr>
                <td><?php echo $value['title'] ?></td>
                <td class="price_right"><?php echo $value['price']?>руб.</td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endforeach; ?>
    <div class="reg_now"><a href="https://dkd.su/g82529">Онлайн запись</a></div>
</div>