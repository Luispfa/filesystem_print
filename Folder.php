<?php

require_once 'File.php';

class Folder extends File {

    private $iterator;

    public function __construct($path) {
        $this->iterator = new FilesystemIterator($path);
        parent::__construct($this->iterator);
    }
    
    /**
     * return list of directories
     * @return type
     */
    public function getDirectories() {
        $directories = array();
        foreach ($this->iterator as $fileInfo) {
            if ($fileInfo->isDir()) {
                $cTime = new DateTime();
                $cTime->setTimestamp($fileInfo->getMTime());
                $directories[] = array('name' => $fileInfo->getFileName(), 'created_at' => $cTime->format('Y-m-d h:i:s'));
            }
        }

        return $directories;
    }

}

?>
