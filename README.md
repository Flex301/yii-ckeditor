yii-ckeditor
============
Usage

    <?php
        $this->widget('ext.ckeditor.CKEditor', array(
            'model' => $model,
            'attribute' => 'text',
            'editorOptions' => array(
                'toolbar' => 'Minimal'
                'filebrowserImageUploadUrl' => Yii::app()->createUrl('/upload/upload')
            )
        ));
    ?>

In upload controller

    public function actions() {
        return array('upload' => array(
            'class' => 'ext.ckeditor.CKEditorUploadAction',
            'path' => 'images/upload'
        ));
    }
