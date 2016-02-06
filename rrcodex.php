<?php
/*
Plugin Name: RRCodeX
Plugin URI: http://www.reinaldorodrigues.com.br/wordpress/plugin/rrcodex
Description: Plugin do Wordpress que ...
Version: 1.0.0
Author: Reinaldo Rodrigues
Author URI:  http://www.reinaldorodrigues.com.br/sobre/
License: GPLv2
*/


// https://github.com/birgire/wp-table-shortcode/blob/master/wp-table-shortcode.php


function rrcodex_shortcode($atts, $content = null){
    
   
    //$content = esc_textarea( trim( strip_tags( $content ) ) );
    $content = str_replace("<p>","", $content);
    $content = str_replace("</p>","", $content);
    $content = str_replace("<br>","", $content);
    $content = str_replace("<br/>","", $content);
    $content = str_replace("<br />","", $content);
    $content = str_replace("&lt;?php","<span class=\"codephp\">&lt;?php</span>", $content);
    $content = str_replace("?&gt;","<span class=\"codephp\">?&gt;</span>", $content);
    
    $a = 1;
    $i = 1;
    $html = '<table class="table-rrcodex">'."\n";
    $html .= '<tbody>'."\n";
    
    
    $rows = explode(PHP_EOL,$content);
    
    for($x = 0; $x <= count($rows); $x++ ){
        if($rows[$x]){
            $html .= '<tr>'."\n";
            $html .= '<td class="ind">'."\n";
            $html .= $a.'</td>'."\n";
            $html .= '<td class="cont">'."\n";
            $html .= $rows[$x].'</td>'."\n";
            $html .= '</tr>'."\n"; 
            $a++;
            $i++;
            if($i >2){
                $i=1;
            }
        }
       
    }
    $html .= '</tbody>'."\n";
    $html .= '</table>'."\n";
    $content = $html;
    return '<div class="rrcodex">'."\n".$content.'</div>'."\n";
}


add_shortcode('rrcodex', 'rrcodex_shortcode');


wp_register_style( 'rrcodex-style', plugins_url( '/css/rrcodex.css', __FILE__ ), array(), time(), 'all' );
    

wp_enqueue_style( 'rrcodex-style' );