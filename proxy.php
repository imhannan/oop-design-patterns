<?php
interface FileInterface
{
    public function content();
}

class RealFile implements FileInterface
{
    private $fileName;

    private $fileContent;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;

        $this->readFile();
    }

    private function readFile()
    {
        $this->fileContent = file_get_contents($this->fileName);
    }

    public function content()
    {
        return $this->fileContent;
    }
}

class ProxyFile implements FileInterface
{
    private $fileName;

    private $realFileObject;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function content()
    {
        // Lazy load the file using the RealFile class
        if (!$this->realFileObject) {
            $this->realFileObject = new RealFile($this->fileName);
        }

        return $this->realFileObject->content();
    }
}
//implement proxy
$realFile = new RealFile('test.php');
var_dump(memory_get_usage()); // ~5Mb
$realFile->content();
var_dump(memory_get_usage()); // ~5Mb

$realFile->content();
var_dump(memory_get_usage()); // ~5Mb

$proxyFile = new ProxyFile('test.php');
var_dump(memory_get_usage()/1024); // ~350Kb
$proxyFile->content();
var_dump(memory_get_usage()); // ~5Mb

$proxyFile->content();
var_dump(memory_get_usage()); // ~5Mb