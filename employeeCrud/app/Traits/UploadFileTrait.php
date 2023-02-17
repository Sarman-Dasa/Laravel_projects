<?php
    namespace App\Traits;

    trait UploadFileTrait{
        public function imageUpload($image,$path)
        {
            $imagename   = $image->getClientOriginalName();
            $image->move(public_path().$path,$imagename);
        }
    }
?>