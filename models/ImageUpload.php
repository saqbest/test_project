<?php
namespace models;

use core\App;
use core\Database;
use Settings\Config;

class ImageUpload extends Database
{
    public $errors = array();
    private $attributes = [
        'size',
        'type',
    ];

    public function isValidate($form)
    {

        if ($form) {

            foreach ($this->attributes as $value) {
                //check if this is an ajax request
                if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
                    $this->errors[] = 'Ajax request d`ont send ';
                }
                if ($form[$value] == '') {
                    $this->errors[] = 'This field <b>' . $value . '</b> empty!';
                }

                //Is file size is less than allowed size.
                if ($form[$value] > 5242880) {
                    $this->errors[] = 'File size is too big!';

                }

                //allowed file type Server side check
                switch (strtolower($form['type'])) {
                    //allowed file types
                    case 'image/png':
                    case 'image/gif':
                    case 'image/jpeg':
                        break;
                    default:
                        $this->errors[] = 'Unsupported File!!';
                }
            }


        } else {
            return false;
        }
        if (empty($this->errors)) {
            return true;
        } else {
            return false;
        }
    }

    public function Save($data)
    {

        $UploadDirectory = 'uploads/images/';
        $File_Name = strtolower($data['name']);
        $File_Ext = substr($File_Name, strrpos($File_Name, '.')); //get file extention
        $Random_Number = rand(0, 9999999999); //Random number to be added to name.
        $NewFileName = $Random_Number . $File_Ext; //new file name

        if (move_uploaded_file($data['tmp_name'], $UploadDirectory . $NewFileName)) {
            $user_id = $_SESSION['user_id'];
            $sql = "UPDATE users SET `image`=:image WHERE `id` = :user_id";
            $result = self::getInstance()->prepare($sql);
            return $result->execute(array(':user_id' => $user_id, ':image' => $NewFileName));
            return true;
        } else {
            return false;
        }


    }
}