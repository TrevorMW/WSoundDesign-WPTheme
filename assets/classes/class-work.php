<?php

class Work
{

    public function __construct()
    {

    }

    public static function getWorkSection($id)
    {

        $html = '';

        // $ppp = is_int($count) ? $count : '-1';

        // $args = array(
        //     'post_type' => 'project',
        //     'posts_per_page' => $ppp
        // );  

        // $loop = new WP_Query($args);

        $projects = get_field('projects', $id);

        if ($projects) {

            $html .= '<section class="projects">';

            foreach ($projects as $project) {

                $project = new Project($project);

                $mobile = $project->mobileImage;
                $desktop = $project->desktopImage;

                $html .= '<article class="project"><a href="' . get_permalink($project->post->ID) . '">';

                $html .= '<picture>';
                $html .= '<source srcset="' . $desktop['url'] . '" media="screen and (min-width:768px)" />';
                $html .= '<img src="' . $mobile['url'] . '" alt="' . $mobile['alt'] . '" title="' . $mobile['title'] . '" width="' . $mobile['width'] . '" height="' . $mobile['height'] . '">';
                $html .= '</picture>';
                $html .= '<div class="projectOverlay">
                                <h3>' . $project->post->post_title . '</h3>
                              </div>';
                $html .= '</a>';

                $html .= '</article>';
            };

            $html .= '</section>';
        };

        return $html;
    }

    public static function buildWorkItem($project)
    {

        $html = '';

        if ($project instanceof Project) {
            $mobile = $project->mobileImage;
            $desktop = $project->desktopImage;

            $html .= '<article class="project"><a href="' . get_permalink($project->post->ID) . '">';

            $html .= '<picture>';
            $html .= '<source srcset="' . $desktop['url'] . '" media="screen and (min-width:768px)" />';
            $html .= '<img src="' . $mobile['url'] . '" alt="' . $mobile['alt'] . '" title="' . $mobile['title'] . '" width="' . $mobile['width'] . '" height="' . $mobile['height'] . '">';
            $html .= '</picture>';
            $html .= '<div class="projectOverlay">
                        <h3>' . $project->post->post_title . '</h3>
                      </div>';
            $html .= '</a>';

            $html .= '</article>';
        }

        return $html;
    }

    public static function getFeaturedWorkItems($id)
    {

        $html = '';
        $projects = get_field('featured_projects', $id);

        if ($projects) {

            $html .= '<section class="projects">';

            foreach ($projects as $project) {
                $project = new Project($project);
                $html .= Work::buildWorkItem($project);
            };

            $html .= '</section>';
        };

        return $html;
    }
}