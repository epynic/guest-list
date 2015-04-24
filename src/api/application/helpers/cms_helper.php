<?php

function btn_edit ($uri)
{
    return anchor($uri, '<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit </button>');
}

function btn_delete ($uri)
{
    return anchor($uri, '<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-exclamation"></i> Delete </button>', array(
        'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?');"
    ));
}

function btn_view ($uri)
{
    return anchor($uri, '<button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> View </button>');
}

function notify($text,$type){
	return !empty($text) ? '<div class="alert '.$type.'" >'.$text.'</div>' : '';
}

function activeClass( $controller_name , $uri ){
    return ( $controller_name ==  $uri ) ? 'active' : '';
}


function check_access( $id ,$merchant_id ,$user_type){
    if( $user_type != 'ADMIN' ){
        return $merchant_id;
    }elseif ( $merchant_id == 0 ) {
        return $id;
    }else{
        return $merchant_id;
    }
}

function create_link($url,$id,$name){
    return base_url('home/salon').'/'.$id.'/'.strtolower( str_replace(' ','-' ,$name) ) ;
}
/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        
        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}


if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}