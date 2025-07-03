<?php 

class Project extends WP_ACF_CPT {

    public $post;
    public $videoJSON;
    public $youtube_id;
    public $youtube_link;
    public $video_type;
    public $vimeo_id;
    public $vimeo_link;

    public function __construct($post){
        if($post instanceof WP_Post){
            parent::__construct($post->ID);

            $this->post = $post;

            $this->videoJSON = $this->getVideoDetails();
        }
    }

    public function getEmbedLink()
    {
        $html = '';
        $url = 'https://www.youtube.com/oembed?format=json&url=';
        
        if($this->post instanceof WP_Post){
            $ytID = $this->youtube_id;
            
            $html .= '<iframe width="100%" src="https://www.youtube.com/embed/' . $ytID . '?si=rfCb0BvMOqYE0KFd" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" style="min-height:500px;" allowfullscreen></iframe>';
        }

        return $html;
    }

    public function getVideoDetails(){

        $type = $this->video_type;

        $data = '';

        if ($type === 'youtube') {
            $url = 'https://www.youtube.com/oembed?format=json&url=';

            if($this->post instanceof WP_Post){
                $ytID = $this->youtube_id;
                
                $url .= urlencode('https://www.youtube.com/watch?v=' . $ytID);
    
                try {
                    $resp = file_get_contents($url);
    
                    if($resp) {
                        $data = json_decode($resp);
                    }
                } catch(Exception $e){
    
                }
            }
        }
        
        if ($type === 'vimeo') {
            $url = '';

            if($this->post instanceof WP_Post){
                $vurl = $this->vimeo_link;
                $url = 'https://vimeo.com/api/oembed.json?url=' .  urlencode($vurl);
                    
                try {
                    $resp = file_get_contents($url);
    
                    if($resp) {
                        $data = json_decode($resp);
                    }
                } catch(Exception $e){
    
                }
            }
        }

        return $data;
    }

    public function getThumbnail(){
        $img = array(
            'image' => '',
            'width' => '',
            'height' => '',
            'title' => '',
            'alt' => ''
        );

        if($this->videoJSON && $this->video_type === 'youtube'){
            $img['url'] = $this->videoJSON->thumbnail_url;
            $img['width'] = $this->videoJSON->thumbnail_width;
            $img['height'] = $this->videoJSON->thumbnail_height;
            $img['title'] = $this->videoJSON->title;
            $img['alt'] = $this->videoJSON->title;
        }

        if($this->videoJSON && $this->video_type === 'vimeo'){
            $img['url'] = $this->videoJSON->thumbnail_url;
            $img['width'] = $this->videoJSON->thumbnail_width;
            $img['height'] = $this->videoJSON->thumbnail_height;
            $img['title'] = $this->videoJSON->title;
            $img['alt'] = $this->videoJSON->description | $this->videoJSON->author_name;
        }

        return $img;
    }
}