<?php

/**
 *
 * @package WordPress
 * @subpackage Slate Theme
 * @author Rafal Gicgier rafal@xfive.co
 */

class SlateSettings
{

    private $settings = [];

    public function __construct($args = [])
    {
        $this->settings = $args;

        add_action('admin_init', [$this, 'adminInit']);
        add_action('admin_menu', [$this, 'optionsPage']);
    }


    /* -- */


    /**
     * Utility that registers setting, adds setting section and adds field for each
     * field provided through config array
     *
     * @hook admin_init
     */
    public function adminInit()
    {
        register_setting('slateOptions', 'slateOptions', [$this, 'optionsValidate']);
        add_settings_section('slateMain', 'Main Settings', [$this, 'optionsText'], 'slateSettings');

        foreach ($this->settings as $option) {
            if (isset($option['generate_field_callback']) && isset($option['validate_field_callback'])) {
                add_settings_field(
                    $option['name'],
                    $option['desc'],
                    $option['generate_field_callback'],
                    'slateSettings',
                    'slateMain',
                    $option
                );

                continue;
            }

            add_settings_field(
                $option['name'],
                $option['desc'],
                [$this, 'optionsGenerateFields'],
                'slateSettings',
                'slateMain',
                $option
            );
        }
    }


    /**
     * Generate section's text
     */
    public function optionsText()
    {
        echo '<p>Change the footer settings here.</p>';
    }


    /**
     * Generates fields for each option specified
     *
     * @param {array of strings} $option
     */
    public function optionsGenerateFields($option)
    {
        if ('text' == $option['type']) {
            $this->optionsGenerateField($option);
        } elseif ('dropdown_pages' == $option['type']) {
            $this->generateDropdownPagesField($option);
        } elseif ('wp_editor' == $option['type']) {
            $this->generateWpEditor($option);
        }
    }


    /**
     * Validates the input
     *
     * @param {mixed} $input
     * @return {mixed}
     */
    public function optionsValidate($input)
    {
        $valid = [];

        foreach ($this->settings as $option) {
            if (isset($option['validate_field_callback'])) {
                $valid[ $option['name'] ] = call_user_func($option['validate_field_callback'], $input);
                continue;
            }

            if ('text' == $option['type']) {
                $valid[$option['name']] = $input[$option['name']];
            } elseif ('dropdown_pages' == $option['type']) {
                $valid[$option['name']] = $input[$option['name']];
            } elseif ('wp_editor' == $option['type']) {
                $valid[$option['name']] = $input[$option['name']];
            }

            // @todo if
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
        if (isset($_GET['settings-updated'])) { // input var okay
            echo "<div class='updated'><p>Theme settings updated successfully.</p></div>";
        }
        ?>

        <?php
        // @todo http://codex.wordpress.org/Function_Reference/get_settings_errors
        $errors = get_settings_errors();

        if ($errors) {
            echo "<div class='error'>";
            foreach ($errors as $error) {
                echo esc_html($error['message']);
            }
            echo '</div>';
        }
        ?>

      <form action="options.php" method="post">
        <?php
        settings_fields('slateOptions');
        do_settings_sections('slateSettings');
        ?>
        <br />
        <input name="slateOptions[submit]" type="submit" class="button-primary" value="<?php esc_attr_e('Save Settings', 'slate'); ?>" />
      </form>
    </div>

        <?php
    }


    /**
    * Adds theme options page
    *
    * @hook admin_menu
    */
    public function optionsPage()
    {
        add_theme_page(
            'Theme Options',
            'Theme Options',
            'manage_options',
            'slateSettings',
            [$this, 'doOptionsPage']
        );
    }


    /* -- */


    /**
     * Generates text field
     *
     * @param {array of strings} $option
     */
    private function optionsGenerateField($option)
    {
        $options = get_option('slateOptions');
        if (! empty($options[ $option['name'] ])) {
            echo esc_attr(
                "<input id=\"{$option['name']}\" name=\"slateOptions[{$option['name']}]\" type=\"text\" size=\"80\"".
                " value=\"{$options[ $option['name'] ]}\" />"
            );
        } else {
            echo esc_attr(
                "<input id=\"{$option['name']}\" name=\"slateOptions[{$option['name']}]\" type=\"text\" size=\"80\"".
                " value=\"\" />"
            );
        }
    }


    /**
     * Generates dropdown of all listed pages
     *
     * @param {array of strings} $option
     */
    private function generateDropdownPagesField($option)
    {
        $options = get_option('slateOptions');
        $args = !empty($options[$option['name']])
            ? [
                'selected' => $options[$option['name']],
                'name'     => "slateOptions[{$option['name']}]",
            ] : [
                'name' => "slateOptions[{$option['name']}]",
            ];

        wp_dropdown_pages($args);
    }


    /**
     * Generates wp_editor textarea
     *
     * @param {array of strings} $option
     */
    private function generateWpEditor($option)
    {
        $options = get_option('slateOptions');
        $settings = [
            'textarea_name' => "slateOptions[{$option['name']}]",
            'media_buttons' => false,
            'wpautop'       => true
        ];

        // if (!empty($options[$option['name']])) {
        //     wp_editor($options[ $option['name'] ], $option['name'], $settings);
        // } else {
        //     wp_editor('', $option['name'], $settings);
        // }

        // wp_editor(
        //     (!empty($options[$option['name']]) ? $options[$option['name']] : ''),
        //     $option['name'],
        //     $settings
        // );

        wp_editor($options[$option['name']], $option['name'], $settings);
    }
}

/* <> */
