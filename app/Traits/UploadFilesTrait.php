<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

trait UploadFilesTrait
{
    // store Image function
    public function storeImage($folderName, $inputName, $imageable_id, $imageable_type)
    {

        if (!empty($inputName)) {
        foreach ($inputName as $photo) {

            $photo->storeAs($folderName . $imageable_id, time() . $photo->getClientOriginalName(), 'files');
            Image::create([
                'name' => time() . $photo->getClientOriginalName(),
                'imageable_id' => $imageable_id,
                'imageable_type' =>  $imageable_type,
            ]);
        }
        }
    }



    // Delete Image function
    public function deleteImage($imageable_id, $folderName, $imageable_type)
    {
        Storage::deleteDirectory('livewire-tmp');

        $images = Image::where('imageable_id', $imageable_id)->where('imageable_type', $imageable_type)->get();
        foreach ($images as $image) {
            $imageName = $image->name;

            $imagePath = public_path('files/' . $folderName . $imageable_id . '/' . $imageName);

            if ($imageName != 'user.jpg') {
                unlink($imagePath);
            }
            $image->delete();
        }
    }


    // store Image function
    public function storeFile($folderName, $inputName, $imageable_id, $imageable_type)
    {

        if (!empty($inputName)) {

            $inputName->storeAs($folderName . $imageable_id, time() . $inputName->getClientOriginalName(), 'files');
            Image::create([
                'name' => time() . $inputName->getClientOriginalName(),
                'imageable_id' => $imageable_id,
                'imageable_type' =>  $imageable_type,
            ]);
        }
    }


    public function updateFile($folderName, $inputName, $imageable_id, $imageable_type)
    {
        $image = Image::where('imageable_id', $imageable_id)->where('imageable_type', $imageable_type)->first();

        if ($inputName != null) {
            $oldImage = public_path('files/' . $folderName . $imageable_id . '/' . $image->name);
            unlink($oldImage);
            $inputName->storeAs($folderName . $imageable_id, time() . $inputName->getClientOriginalName(), 'files');
            $imageName = time() . $inputName->getClientOriginalName();
        } else {
            $imageName = $image->name;
        }
        $image->update([
            'name' => $imageName,
            'imageable_id' => $imageable_id,
            'imageable_type' =>  $imageable_type,
        ]);
    }
}
