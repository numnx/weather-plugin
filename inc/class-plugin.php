<?php
class WeatherExample
{
    public function __construct()
    {
        $this->loadDependencies();
        $this->checkACF();
        $this->loadFrontendCss();
        $this->registerFieldGroups();
        $this->registerPostType();
        $this->disableGutenberg();
        $this->registerPostTypeTemplate();
    }

    private function loadDependencies()
    {
        require_once plugin_dir_path(__FILE__) . 'class-weatherapi.php';
    }
    # Prüft ob ACF aktiviert ist
    private function checkACF()
    {
        if (!function_exists('acf_add_local_field_group')) {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-error"><p>Um das Wetterplugin zu benutzen wird ACF benötigt.</p></div>';
            });
            return;
        }
    }
    
    # Lädt Frontend CSS
    private function loadFrontendCss()
    {
        # if singular or archive stadt load frontend css
            add_action('wp_enqueue_scripts', function () {
                wp_enqueue_style('weather-example-frontend', plugin_dir_url(__DIR__) . 'css/frontend.css', [], '1.0.0', 'all');
            });
    
    }
    # Lädt die ACF Feldgruppen von einer Json Datei
    private function registerFieldGroups()
    {

        add_filter('acf/settings/load_json', 'my_acf_json_load_point');
        function my_acf_json_load_point($paths)
        {

            // remove original path (optional)
            unset($paths[0]);


            // append path
            $paths[] = plugin_dir_path(__DIR__) . 'acf';


            // return
            return $paths;
        }
    }


    # Registriert den Post Type Wetter/Städte
    private function registerPostType()
    {
        add_action('init', 'add_post_type_stadt');
        function add_post_type_stadt()
        {
            register_post_type('stadt', array(
                'labels' => array(
                    'name' => 'Städte',
                    'singular_name' => 'Stadt',
                    'add_new' => 'Stadt hinzufügen',
                    'add_new_item' => 'Neue Stadt hinzufügen',
                    'edit_item' => 'Stadt bearbeiten',
                    'new_item' => 'Neue Stadt',
                    'view_item' => 'Stadt ansehen',
                    'search_items' => 'Städte suchen',
                    'not_found' => 'Keine Städte gefunden',
                    'not_found_in_trash' => 'Keine Städte im Papierkorb gefunden',
                    'parent_item_colon' => 'Übergeordnete Stadt',
                    'menu_name' => 'Städte'
                ),
                'public' => true,
                'menu_position' => 1,
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
                'has_archive' => true,
                'rewrite' => array('slug' => 'stadt'),
                'show_in_rest' => true,
                'taxonomies' => array('category', 'post_tag'),
                'menu_icon' => 'dashicons-admin-site-alt3'
            ));
        }
    }
    # Deaktiviert Gutenberg für den Post Type Städte

    private function disableGutenberg()
    {
        add_filter('use_block_editor_for_post_type', 'disable_gutenberg', 10, 2);
        function disable_gutenberg($current_status, $post_type)
        {
            if ($post_type === 'stadt') return false;
            return $current_status;
        }
    }
    private function registerPostTypeTemplate() {
        # Läd das Template für den Post Type Städte
        add_filter('template_include', 'include_template_function', 1);
        function include_template_function($template_path)
        {
            if (get_post_type() == 'stadt') {
                if (is_single()) {
                        $template_path = plugin_dir_path(__DIR__) . '/views/single-stadt.php';
                }
            }
            return $template_path;
        }
        
    }
}
