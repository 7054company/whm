<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

namespace WHMCS\File;

class Directory
{
    protected $path = "";
    public function __construct($path)
    {
        $this->setPath($path);
    }
    protected function setPath($path)
    {
        $full_path = ROOTDIR . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR;
        if (!is_dir($full_path)) {
            throw new \WHMCS\Exception("Not a valid directory");
        }
        $this->path = $full_path;
    }
    protected function getPath()
    {
        return $this->path;
    }
    public function getSubdirectories()
    {
        $folders = array();
        $dh = opendir($this->getPath());
        while (false !== ($folder = readdir($dh))) {
            if ($folder != "." && $folder != ".." && is_dir($this->getPath() . $folder)) {
                $folders[] = $folder;
            }
        }
        closedir($dh);
        sort($folders);
        return $folders;
    }
    public function listFiles()
    {
        $files = array();
        $dh = opendir($this->getPath());
        while (false !== ($file = readdir($dh))) {
            if (is_file($this->getPath() . $file)) {
                $files[] = $file;
            }
        }
        closedir($dh);
        sort($files);
        return $files;
    }
}

?>