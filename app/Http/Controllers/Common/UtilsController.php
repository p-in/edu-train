<?php
/**
 * Created Date: 2019/3/9 0009
 * User: allen
 * Desc: 通用 工具类
 */

namespace App\Http\Controllers\Common;

class UtilsController
{
    static public function jsonResponse ($data = null, $code = StringsController::Code_Succeed,
                                         $msg = StringsController::Msg_Succeed_Zh)
    {
        $data = UtilsController::replaceAllNullToEmptyString($data);
        return response()->json(UtilsController::pack($data, $code, $msg));
    }
    
    static function replaceAllNullToEmptyString ($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[ $key ] = UtilsController::replaceAllNullToEmptyString($value);
            }
        } else if (is_object($data)) {
            foreach ($data as $key => $value) {
                $data->$key = UtilsController::replaceAllNullToEmptyString($value);
            }
        } else if ($data === null) {
            $data = '';
        }
        
        return $data;
    }
    
    static public function pack ($data, $code = StringsController::Code_Succeed,
                                 $msg = StringsController::Msg_Succeed_Zh)
    {
        $package = [
            'code'   => $code,
            'message' => $msg,
            'data'   => $data
        ];
        
        return $package;
    }

}