yii-ckeditor
============
<?php
    $this->widget('ext.ckeditor.CKEditor', array(
        'model' => $model,
        'attribute' => 'text',
        'editorOptions' => array(
            'toolbar' => 'Minimal'
        )
    ));
?>