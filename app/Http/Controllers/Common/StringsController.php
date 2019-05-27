<?php
/**
 * Created Date: 2019/3/9 0009
 * User: Mr_X
 * Desc: 通用 状态码 及 说明文件 常量类 为了易于管理 此处命名规范为 大驼峰+下划线
 */

namespace App\Http\Controllers\Common;


class StringsController
{
    //////////////////// 通用 Code ////////////////////
    const Code_Succeed = 0;
    const Msg_Succeed_Zh = '操作成功';
    
    const Code_Failed = 1;
    const Msg_Failed_Zh = '操作失败';
    
    const Code_Invalid_Operation = 2;
    const Msg_Invalid_Operation_Zh = '非法操作';
    
    const Code_Not_Login = 3;
    const Msg_Not_Login_Zh = '请登录后再操作';
    
    const Code_DB_Error = 4;
    const Msg_DB_Error_Zh = '数据库异常';
    
    const Code_Logic_Error = 5;
    const Msg_Logic_Error_Zh = '逻辑错误';
    
    const Code_Not_Admin = 6;
    const Msg_Not_Admin_Zh = '没有权限';
    
    const Code_No_Data = 7;
    const Msg_No_Data_Zh = '没有数据';
    
    const Code_Data_Is_Exist = 8;
    const Msg_Data_Is_Exist_Zh = '数据已存在';
    
    const Code_Not_member = 9;
    const Msg_Not_member_Zh = '非网站会员';
    
    const Code_Pass_Error = 10;
    const Msg_Pass_Error_Zh = '密码错误';
    
    const Code_Param_Error = 11;
    const Msg_Param_Error_Zh = '参数异常';
    
    const Code_Validation_Error = 12;
    const Msg_Code_Validation_Error_Zh = '数据验证失败';

    //////////////////// 业务 Code ////////////////////
    // 公用
    const Exception_Unknown = 0; // 未知
    const Exception_Unknown_Zh = '未知'; // 未知

}