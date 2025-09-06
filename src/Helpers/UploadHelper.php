<?php

 namespace App\Helpers;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

 class UploadHelper
 {
    private $uploadsPath;
    private $slugger;
    public function ___construct(string $uploadPath, SluggerInterface $slugger)
    {
        $this->uploadsPath = $uploadPath;
        $this->slugger = $slugger;
    }

    public function uploadProductImage(UploadedFile $uploadedFile): string
    {
        $destination = $this->uploadsPath.'/product_images';

        $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this -> slugger -> slug($originalFilename);

        $newFilename = $safeFilename.'-'.uniqid().'.'.$uploadedFile -> guessExtension();

        $uploadedFile->move(
            $destination,
            $newFilename
        );

        return $newFilename;
    }

    public function getTargetDirectory(): string
    {
        return $this -> uploadsPath.'/product_images';
    }
 }