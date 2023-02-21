<?php
    namespace App\Http\Traits;

    trait ResponseTraits{
        public function sendErrorResponse($validation)
        {
            return response()->json(['status'=>false,'message'=>'Validation Error','Error'=>$validation->errors()],422);    
        }

        public function sendSuccessResponse($status,$message,$data="")
        {
            return response()->json(['status'=>$status,'message'=>$message,'data'=>$data],200);
        }
        public function sendExecptionMessage($ex)
        {
            return response()->json(['status'=>false,'message'=>$ex->getMessage()],500);
        }
    }


?>