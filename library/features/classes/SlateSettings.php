<?php

/**
 * Feature: .
 *
 * @package    WordPress
 * @subpackage Slate
 * @author     Jason D. Moss <jason@jdmlabs.com>
 * @copyright  2017 Jason D. Moss. All rights freely given.
 * @version    0.1.0
 * @license    https://github.com/jasondmoss/wptheme-slate/blob/master/LICENSE.md [WTFPL License]
 * @link       https://www.jdmlabs.com/
 */


class SlateSettings
{

    /**
     * @var array
     * @access private
     */
    private $settings = [];


    /**
     * Constructor.
     *
     * @param array $args
     */
    public function __construct($args = [])
    {
        $this->settings = $args;

        add_action('admin_init', [$this, 'adminInit']);
        add_action('admin_menu', [$this, 'optionsPage']);
    }


    /* -- */


    /**
     * Utility that registers setting, adds setting section and adds field for
     * each field provided through config array.
     *
     * @hook admin_init
     */
    public function adminInit()
    {
        /**
         * Register Slate Options.
         */
        register_setting(
            'slate_options',
            'slate_options',
            [$this, 'optionsValidate']
        );

        add_settings_section(
            'footer',
            'Footer Profile Links',
            [$this, 'optionsText'],
            'slate-theme-options'
        );

        foreach ($this->settings as $option) {
            if (isset($option['generate_field_callback']) && isset($option['validate_field_callback'])) {
                add_settings_field(
                    $option['name'],
                    $option['desc'],
                    $option['generate_field_callback'],
                    'slate-theme-options',
                    'footer',
                    $option
                );

                continue;
            }

            add_settings_field(
                $option['name'],
                $option['desc'],
                [$this, 'optionsGenerateFields'],
                'slate-theme-options',
                'footer',
                $option
            );
        }
    }


    /**
     * Generate section's text.
     */
    public function optionsText()
    {
        echo '<p>'. __('Change the footer settings here.', 'slate') .'</p>';
    }


    /**
     * Generates fields for each option specified.
     *
     * @param array $option
     */
    public function optionsGenerateFields($option)
    {
        switch ($option['type']) {
            /**
             * Text input field.
             */
            case 'text':
                $this->optionsGenerateField($option);
                break;

            /**
             * <select> dropdown field.
             */
            case 'dropdown_pages':
                $this->generateDropdownPagesField($option);
                break;

            /**
             * Rich Text Editer.
             */
            case 'wp_editor':
                $this->generateWpEditor($option);
                break;
        }
    }


    /**
     * Validates the input.
     *
     * @param mixed $input
     *
     * @return mixed
     */
    public function optionsValidate($input)
    {
        $valid = [];
        foreach ($this->settings as $option) {
            if (isset($option['validate_field_callback'])) {
                $valid[$option['name']] = call_user_func($option['validate_field_callback'], $input);
                continue;
            }

            $valid[$option['name']] = $input[$option['name']];
        }

        return $valid;
    }


    /**
     * Generates Backend Page for options
     *
     * @hook add_theme_page
     */
    public function doOptionsPage()
    {
        ?>

    <div class="wrap">
        <?php

        if (isset($_GET['settings-updated'])) {
            echo "<div class='updated'><p>Theme settings updated successfully.</p></div>";
        }

        /**
         * @todo http://codex.wordpress.org/Function_Reference/get_settings_errors
         */
        if ($errors = get_settings_errors()) {
            echo "\n\n<div class=\"error\">";
            foreach ($errors as $error) {
                echo esc_html($error['message']);
            }
            echo "</div>\n\n";
        }

        ?>
      <form action="<?php echo admin_url('options.php'); ?>" method="post">
        <?php

        settings_fields('slate_options');

        do_settings_sections('slate-theme-options');

        submit_button(
            __('Save Settings', 'slate'),
            'primary',
            'slate_options[submit]',
            true,
            []
        );

        ?>
      </form>
    </div>

        <?php
    }


    /**
    * Adds theme options page.
    *
    * @hook admin_menu
    */
    public function optionsPage()
    {
        add_theme_page(
            'Theme Options',
            'Theme Options',
            'manage_options',
            'slate-theme-options',
            [$this, 'doOptionsPage']
        );
    }


    /* -- */


    /**
     * Generates text field.
     *
     * @param array $option
     */
    private function optionsGenerateField($option)
    {
        $options = get_option('slate_options');

        echo "<input id=\"{$option['name']}\" name=\"slate_options[{$option['name']}]\" type=\"text\" value=\"".
            (!empty($options[$option['name']]) ? esc_attr($options[$option['name']]) : '') ."\" size=\"80\">";
    }


    /**
     * Generates dropdown of all listed pages.
     *
     * @param array $option
     */
    private function generateDropdownPagesField($option)
    {
        $options = get_option('slate_options');
        $args = !empty($options[$option['name']]) ? [
            'selected' => $options[$option['name']],
            'name'     => "slate_options[{$option['name']}]",
        ] : [
            'name' => "slate_options[{$option['name']}]",
        ];

        wp_dropdown_pages($args);
    }


    /**
     * Generates wp_editor textarea.
     *
     * @param array $option
     */
    private function generateWpEditor($option)
    {
        $options = get_option('slate_options');
        $settings = [
            'textarea_name' => "slate_options[{$option['name']}]",
            'media_buttons' => false,
            'wpautop'       => true
        ];

        wp_editor($options[$option['name']], $option['name'], $settings);
    }
}

/* <> */
