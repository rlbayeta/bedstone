<?php

namespace App;

use Sober\Controller\Controller;

class BreadCrumbs extends Controller
{

   public static function getMenuIdLabel($post_id, $menu) {
        $menu_title = '';
        $nav = wp_get_nav_menu_items($menu);
        if($nav !== false) {
            foreach ($nav as $item) {
                if ($post_id == $item->object_id) {
                    $menu_title = $item->post_title;
                    break;
                }
            }
        }
        return ($menu_title !== '') ? $menu_title : get_the_title($post_id);
    }

    public static function getMenuUrl($post_id, $menu) {
        $url = '';
        $nav = wp_get_nav_menu_items($menu);
        if($nav !== false) {
            foreach ($nav as $item) {
                if ($post_id == $item->object_id) {
                    $url = $item->url;
                    break;
                }
            }
        }
        return ($url !== '') ? $url : get_the_title($post_id);
    }
}
