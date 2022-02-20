<?php

class FileManager {
    /**
     * @param FileInterface $file
     * @return void
     */
    public function display(FileInterface $file)
    {
        $file->display();
    }
}

interface FileInterface{
    public function display();
}

class Image implements FileInterface{
    public function display()
    {
        echo "displaying image".PHP_EOL;
    }
}

class PDF implements FileInterface{
    public function display()
    {
        echo "diplaying PDf".PHP_EOL;
    }
}

class Video implements FileInterface{
    public function display()
    {
        echo "displaying mp4".PHP_EOL;
    }
}

$image = new Image();

$fm = new FileManager();
$fm->display($image);
