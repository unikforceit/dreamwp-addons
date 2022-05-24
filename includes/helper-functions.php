<?php
function dreamwp_check_odd_even($data){
    if($data % 2 == 0){
        $data = "Even";
    }
    else{
        $data = "Odd";
    }

    return $data;
}

function dreamwp_client_ratings($count){
    $out = '';
    for ($i=0; $i<$count; $i++) {
        $out.= '<i class="fas fa-star"></i>';
    }
    return $out;
}

function dreamwp_get_that_link($link){

    $url = $link['url'] ? 'href='.esc_url($link['url']). '' : '';
    $ext = $link['is_external'] ? 'target= _blank' : '';
    $nofollow = $link['nofollow'] ? 'rel="nofollow"' : '';
    $link = $url.' '.$ext.' '.$nofollow;
    return $link;
}
function dreamwp_get_that_image($source, $class = 'image'){
    if ($source){
        $image = '<img class="'.$class.'" src="'. esc_url( $source['url'] ).'" alt="'.get_bloginfo( 'name' ).'">';
    }
    return $image;
}