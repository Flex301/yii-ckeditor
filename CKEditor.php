<?php

class CKEditor extends CInputWidget
{
    public $editorOptions = array();

    public function init() {
        $this->publishAssets();
    }

    public function publishAssets() {
        $assets = dirname(__FILE__) . '/assets';
        $baseUrl = Yii::app()->assetManager->publish($assets);
        if (is_dir($assets)) {
            Yii::app()->clientScript->registerScriptFile($baseUrl . '/ckeditor/ckeditor.js');
        } else {
            throw new CHttpException(500, __CLASS__ . ' - Error: Couldn\'t find assets to publish.');
        }
    }

    public function run()
    {
        list($name, $id) = $this->resolveNameID();
        $config = CJSON::encode($this->editorOptions);
        Yii::app()->clientScript->registerScript(__CLASS__ . '#' . $id, "CKEDITOR.replace('{$id}', {$config});", CClientScript::POS_READY);

        echo CHtml::activeLabelEx($this->model, $this->attribute);
        if ($this->hasModel())
        {
            $html = CHtml::activeTextArea($this->model, $this->attribute, $this->htmlOptions);
        } else
        {
            $html = CHtml::textArea($name, $this->value, $this->htmlOptions);
        }
        echo $html;
    }
}


