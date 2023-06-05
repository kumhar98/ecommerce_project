<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use CodeIgniter\Files\File;

class ImageUploadController extends BaseController
{
    public function upload($images)
    {
        $validationRule = [
            'images' =>  [
                'uploaded[images.0]', 
                'is_image[images]',
                'mime_in[images,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                // 'max_size[images,100]',
                // 'max_dims[images,1024,768]',
            ],
        ];
        if (! $this->validateData(["Profile" => $images] , $validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
            return   $data;
        }
        if ($images) {
              $name=[];
            foreach ($images['images'] as $img) {
                if ($img->isValid() && ! $img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move(FCPATH . 'admin/images', $newName);
                    array_push( $name,$newName);
                }
            }
            return $name;
        }
        $data = ['errors' => 'The file has already been moved.'];

        return  $data;
    }
}