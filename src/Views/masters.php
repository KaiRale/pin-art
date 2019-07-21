<div class="masters">
    <h2>Наши мастера</h2>
    <hr width="80%">

    <?php foreach ($mastersInfo as $master): ?>
        <div class="one_master">
        <h3 class="master_name"> <?php echo $master['name']; ?></h3>
        <p class="about_master_info"> <?php echo $master['aboutinfo']; ?></p>
        <?php if (count($master['img']) > 0): ?>
            </div>
            <div class="for_pictures">
                <?php foreach ($master['img'] as $img): ?>
                    <a class="fancybox" rel="group" href="/img/<?php echo $img; ?>">
                        <img class="master_picture_one" src="/img/<?php echo $img; ?>"></a>


                <?php endforeach; ?>
            </div>
        <?php endif ?>

    <?php endforeach ?>
</div>



<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox();
    });
</script>