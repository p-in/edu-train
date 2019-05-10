<?php
/**
 * User: allen.xiong
 * Date: 2019/3/11
 * Time: 11:37
 * Desc:
 */

namespace App\Http\Controllers\Common;

use App\Models\BookCategory;
use Illuminate\Support\Facades\Cache;

class CommonController
{
    /**
     * 404 页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    static public function not_found_404(){
        return response()->view('errors.404',[],404);
    }

}