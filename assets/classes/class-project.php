<?php

class Project extends WP_ACF_CPT
{

    public $post;
    public $videoJSON;
    public $youtube_id;
    public $youtube_link;
    public $video_type;
    public $vimeo_id;
    public $vimeo_link;
    public $maxResThumbnail;
    public $mobileImage;
    public $desktopImage;
    public $relatedProjects;
    public $hasRelatedProjects;

    public function __construct($post)
    {
        if ($post instanceof WP_Post) {
            parent::__construct($post->ID);

            $this->post = $post;
            $this->videoJSON = $this->getVideoDetails();

            $this->hasRelatedProjects = $this->related_projects && count($this->related_projects) > 0;

            $thumbnailID = get_post_thumbnail_id($this->post->ID);

            if($thumbnailID){
                $this->mobileImage = $this->getThumbnail(wp_get_attachment_image_src($thumbnailID, 'project-mobile'));
                $this->desktopImage = $this->getThumbnail(wp_get_attachment_image_src($thumbnailID, 'project-desktop'));  
            } else {
                $thumbnail = $this->getThumbnail();
            
                $this->mobileImage  = $thumbnail;
                $this->desktopImage = $thumbnail;
            }     
        }
    }

    public function getEmbedLink()
    {
        $html = '';
        $url = 'https://www.youtube.com/oembed?format=json&url=';

        if ($this->post instanceof WP_Post) {
            $ytID = $this->youtube_id;

            $html .= '<iframe width="100%" src="https://www.youtube.com/embed/' . $ytID . '?si=rfCb0BvMOqYE0KFd" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" style="min-height:500px;" allowfullscreen></iframe>';
        }

        return $html;
    }

    public function getVideoDetails()
    {

        $type = $this->video_type;

        $data = '';

        if ($type === 'youtube') {
            $url = 'https://www.youtube.com/oembed?format=json&url=';

            if ($this->post instanceof WP_Post) {
                $ytID = $this->youtube_id;

                $url .= urlencode('https://www.youtube.com/watch?v=' . $ytID);

                try {
                    $resp = file_get_contents($url);

                    if ($resp) {
                        $data = json_decode($resp);
                    }
                } catch (Exception $e) {

                }

                $this->maxResThumbnail = 'http://img.youtube.com/vi/' . $ytID . '/maxresdefault.jpg';
            }
        }

        if ($type === 'vimeo') {
            $url = '';

            if ($this->post instanceof WP_Post) {
                $vurl = $this->vimeo_link;
                $url = 'https://vimeo.com/api/oembed.json?url=' . urlencode($vurl);

                try {
                    $resp = file_get_contents($url);

                    if ($resp) {
                        $data = json_decode($resp);
                    }
                } catch (Exception $e) {

                }
            }
        }

        return $data;
    }

    public function getThumbnail($attachArr = false)
    {
        $img = array(
            'url' => '',
            'width' => '',
            'height' => '',
            'title' => '',
            'alt' => ''
        );

        if(is_array($attachArr)){
            $img['url'] = $attachArr[0];
            $img['width'] = $attachArr[1];
            $img['height'] = $attachArr[2];

        } else {
            if ($this->videoJSON && $this->video_type === 'youtube') {
                if ($this->maxResThumbnail) {
                    $img['url'] = $this->maxResThumbnail;
                } else {
                    $img['url'] = $this->videoJSON->thumbnail_url;
                    $img['width'] = $this->videoJSON->thumbnail_width;
                    $img['height'] = $this->videoJSON->thumbnail_height;
                }
    
                $img['title'] = $this->videoJSON->title;
                $img['alt'] = $this->videoJSON->title;
            }
    
            if ($this->videoJSON && $this->video_type === 'vimeo') {
                $img['url'] = $this->getLargerVimeoThumbnail($this->videoJSON->thumbnail_url, 1280, 720);
                $img['width'] = $this->videoJSON->thumbnail_width;
                $img['height'] = $this->videoJSON->thumbnail_height;
                $img['title'] = $this->videoJSON->title;
                $img['alt'] = $this->videoJSON->description | $this->videoJSON->author_name;
            }    
        }
        
        return $img;
    }

    public function getLargerVimeoThumbnail($url, $w, $h)
    {
        $pattern = '/_(\d+)x(\d+)(?=\?)/';

        if (preg_match($pattern, $url)) {
            $url = preg_replace($pattern, "_{$w}x{$h}", $url);
        }

        return $url;
    }
    
    public function getRelatedProjects()
    {
        $html = '';
        $projects = $this->related_projects;

        if ($this->hasRelatedProjects) {

            foreach ($projects as $post) {
                $project = new Project($post);
                $html .= Work::buildWorkItem($project);
            };
        };

        return $html;
    }
}