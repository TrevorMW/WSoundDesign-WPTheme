<?php 

class SubHero {

    public function __construct(){

    }

    public static function getImageHtml($id) {

        $html = '';

        if(is_int($id)){
            $image = get_field('background_image', $id);

            if($image){

                $html .= '<div class="subHeroOverlay"></div><picture>';
                $html .= '<source srcset="' . $image['sizes']['medium'] . '" media="screen and max-width:768px;" />';
                $html .= '<img src="' . $image['sizes']['subhero'] . '" alt="' . $image['alt'] . '" title="' . $image['title'] . '" width="' . $image['sizes']['subhero-width'] . '" height="' . $image['sizes']['subhero-height'] . '" />';
                $html .= '</picture>';
            }
        }

        return $html;
    }
}