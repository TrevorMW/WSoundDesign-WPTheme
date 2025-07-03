<?php 

class Work {

    public function __construct(){

    }

    public static function getWorkSection($id) {

        $html = '';

        // $ppp = is_int($count) ? $count : '-1';

        // $args = array(
        //     'post_type' => 'project',
        //     'posts_per_page' => $ppp
        // );  

        // $loop = new WP_Query($args);

        $projects = get_field('projects', $id);

        if($projects){

            $html .= '<section class="projects">';

            foreach($projects as $project) {

                $project = new Project($project);

                $thumbnail = $project->getThumbnail();
                
                if ($thumbnail) {
                    $html .= '<article class="project"><a href="' . get_permalink($project->post->ID) . '">';

                    $html .= '<picture>';
                    $html .= '<img src="' . $thumbnail['url'] . '" alt="' . $thumbnail['alt'] . '" title="' . $thumbnail['title'] . '" width="' . $thumbnail['width'] . '" height="' . $thumbnail['height'] . '">';
                    $html .= '</picture>';
                    $html .= '</a></article>';
                }
                
            };

            $html .= '</section>';
        };

        return $html;
    }

    public static function buildWorkItem($project){

        $html = '';

        if($project instanceof Project){
            $thumbnail = $project->getThumbnail();
                $html .= '<article class="project"><a href="' . get_permalink($project->post->ID) . '">';

                $html .= '<picture>';
                $html .= '<img src="' . $thumbnail['url'] . '" alt="' . $thumbnail['alt'] . '" title="' . $thumbnail['title'] . '" width="' . $thumbnail['width'] . '" height="' . $thumbnail['height'] . '">';
                $html .= '</picture>';
                $html .= '</a></article>';
        }

        return $html;
    }

    public static function getFeaturedWorkItems($id){

        $html = '';
        $projects = get_field('featured_projects', $id);

        if($projects){

            $html .= '<section class="projects">';

            foreach($projects as $project) {
                $project = new Project($project);
                $html .= Work::buildWorkItem($project);
            };

            $html .= '</section>';
        };

        return $html;
    }
}