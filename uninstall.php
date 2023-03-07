// If uninstall not called from WordPress, then exit.
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit();
}

// Delete custom post meta data
$meta_keys = array('damjanwp_url', 'damjanwp_url_text');
foreach ($meta_keys as $key) {
    delete_post_meta_by_key($key);
}

// Delete custom options
delete_option('damjanwp_custom_option');

