<?php

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;


class FilesController
{
    public function file(){
        try {
            $filesystem = new Filesystem();
            $filesystem->mkdir(
                Path::normalize(sys_get_temp_dir().'/'.random_int(0, 1000)),
            );
        } catch (IOExceptionInterface $exception) {
            echo "An error occurred while creating your directory at ".$exception->getPath();
        }
    }

}
