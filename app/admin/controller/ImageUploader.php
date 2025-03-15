<?php

class ImageUploader
{
    private $targetDir;

    public function __construct()
    {
        $this->targetDir = "../../app/admin/lib/upload/";
    }

    /**
     * Upload ảnh đơn
     */
    public function uploadSingleImage($file)
    {
        if ($file['error'] === UPLOAD_ERR_OK) {
            $fileName = uniqid() . "_" . basename($file['name']);
            $targetFilePath = $this->targetDir . $fileName;

            if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                return $fileName;
            }
        }
        return null;
    }

    /**
     * Upload nhiều ảnh (nếu có)
     */
    public function uploadMultipleImages($files)
    {
        $uploadedFiles = [];
        foreach ($files['name'] as $key => $name) {
            if ($files['error'][$key] === UPLOAD_ERR_OK) {
                $fileName = uniqid() . "_" . basename($name);
                $targetFilePath = $this->targetDir . $fileName;

                if (move_uploaded_file($files['tmp_name'][$key], $targetFilePath)) {
                    $uploadedFiles[] = $fileName;
                }
            }
        }
        return $uploadedFiles;
    }
}
