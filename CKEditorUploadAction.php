<?php

class CKEditorUploadAction extends CAction
{
    public $path;

    public function run()
    {
        $basePath = dirname(Yii::app()->request->scriptFile);
        $callback = $_GET['CKEditorFuncNum'];
        $file_name = $_FILES['upload']['name'];
        $file_name_tmp = $_FILES['upload']['tmp_name'];
        $file_new_name = $basePath . DIRECTORY_SEPARATOR . $this->path;
        $full_path = $file_new_name . DIRECTORY_SEPARATOR . $file_name;
        $http_path = Yii::app()->urlManager->getBaseUrl() . '/' . $this->path . '/' . $file_name;

        $error = '';
        if (!move_uploaded_file($file_name_tmp, $full_path)) {
            $error = 'Some error occured please try again later';
            $http_path = '';
        }
        echo "<script type=\"text/javascript\">
                 window.parent.CKEDITOR.tools.callFunction(".$callback.",  \"".$http_path."\", \"".$error."\" );
             </script>";
    }
}