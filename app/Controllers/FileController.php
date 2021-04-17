<?php
namespace App\Controllers;

class FileController {

    protected $errors = [
        "OK",
        "The uploaded file exceeds the upload_max_filesize directive in php.ini",
        "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
        "The uploaded file was only partially uploaded",
        "No file was uploaded",
        "UNKNOWN",
        "Missing a temporary folder.",
        "Failed to write file to disk.",
        "A PHP extension stopped the file upload."
    ];

    public function __construct()
    {
        $this->folderLocation = UPLOAD_DIR;
    }

    public function upload($file_input)
    {
        $arraySuccess = [];
        $arrayErrors = [];
        $this->createUploadDir();
        if(! isset($_FILES[$file_input])){
            return false;
        }
        $total = $this->getTotalFiles($_FILES[$file_input], $_FILES[$file_input]['name']);
        for($initialize = 0; $initialize < $total; $initialize++){
            $status = $_FILES[$file_input]['error'][$initialize];
            $filename = $_FILES[$file_input]['name'][$initialize];
            $destination = $this->folderLocation . $filename;
            $uploadFile = $_FILES[$file_input]['tmp_name'][$initialize];
            if($this->statusIsOK($status) && $this->isImageFile($filename)){
                $arraySuccess = $this->moveFile($uploadFile, $destination, $filename, $status);
            }else{
                $arrayErrors = $this->processError($filename, $destination, $status);
            }
        }
        return [
            'success' => $arraySuccess,
            'errors' => $arrayErrors
        ];
    }

    private function isImageFile($filename)
    {
        $allowed = ['jpg', 'jpeg', 'png'];
        $pathInfo = pathinfo($filename);
        return in_array($pathInfo['extension'], $allowed);
    }

    private function processError($filename, $destination, $status)
    {
        $arrayErrors = [];
        array_push($arrayErrors, $this->responseUpload(
            $filename, 
            $destination,
            $this->errors[$status] ?? 'Unknown'
        ));
        return $arrayErrors;
    }

    private function moveFile($uploadFile, $destination, $filename, $status)
    {
        $arraySuccess = [];
        $result = move_uploaded_file($uploadFile, $destination);
        if($result){
            array_push($arraySuccess, $this->responseUpload(
                $filename, 
                $destination,
                $this->errors[$status]
            ));
        }
        return $arraySuccess;
    }

    private function responseUpload($filename, $destination, $message)
    {
        return [
            'filename' => $filename,
            'full_path' => $destination,
            'web_path' => '/storage/'. $filename,
            'message' => $message
        ];
    }

    private function getTotalFiles($files, $filenames)
    {
        return isset($files) ? count($filenames) : 0;
    }

    private function createUploadDir()
    {
        if(! file_exists($this->folderLocation)){
            mkdir($this->folderLocation);
        }
    }

    private function statusIsOK($error)
    {
        return $error == 0;
    }
}