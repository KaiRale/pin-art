<div class="recommendation">
    <h2>Советы</h2>
    <hr width="80%">
    <?php foreach ($recommendations as $recommendation): ?>
        <div ng-bind-html="quillEditor" id="myQuillEditor">
<?php echo $recommendation['recommendation'] ?>
</div>
        &#10023;&#10023;&#10023;
    <?php endforeach; ?>

</div>

<script>
    var quill = new Quill('#myQuillEditor',{
        readOnly: true,
    });
</script>