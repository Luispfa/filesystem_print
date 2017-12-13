<?php

class File {

    protected $files = array();
    private $iterator;

    public function __construct($iterator) {
        $this->iterator = $iterator;
    }

    /**
     * Return list of files
     * @return array
     */
    public function getFiles() {
        foreach ($this->iterator as $fileInfo) {
            if ($fileInfo->isFile()) {
                $cTime = new DateTime();
                $cTime->setTimestamp($fileInfo->getCTime());
                $this->files[] = array('name' => $fileInfo->getFileName(), 'created_at' => $cTime->format('Y-m-d h:i:s'));
            }
        }

        return $this->files;
    }

}

?>