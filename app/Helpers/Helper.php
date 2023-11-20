<?php

namespace App\Helpers;

class Helper{
    public static function category($categories, $char=''){
        $html='';

        foreach($categories as $key => $category){
            $html .= '
            <tr>
                <td>'. $category->id .'</td>
                <td>'. $category->name .'</td>
                <td>
                    <a href="/admin/menus/edit/'. $category->id .'" name = "edit" value = "edit" class="btn btn-success">
                    <b class="mdi mdi-upload btn-icon-prepend">Sửa</b></a>

                    <a href="/admin/menus/destroy" onclick="removeRow('. $category->id .', \'/admin/menus/destroy\')" name = "delete" value = "delete" class="btn btn-danger">
                    <b class="mdi mdi-alert btn-icon-prepend">Xóa</b></a>
                </td>
            </tr>
            ';
        }
        return $html;
    } 

    public static function active($active =0) : string
    {
        return $active == 0 ? '<span>No</span>' : '<span>Yes</span>';
    }
}