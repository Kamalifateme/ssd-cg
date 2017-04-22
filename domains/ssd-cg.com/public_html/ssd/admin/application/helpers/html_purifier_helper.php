<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * HTML Purifier CodeIgniter Helper
 *
 * Clean HTML input with HTML purifier
 * Specify doctype and encoding
 *
 * @category    Helpers
 * @author      Richard O'Dwyer
 * @license     WTFPL, Version 2 (http://www.gnu.org/licenses/license-list.html#WTFPL)
 * @link        http://richard.do
 * @version     1.0
 */
if (!function_exists('html_purify')) {
    function html_purify($dirty_html, $doctype = null, $encoding = null)
    {
        if ($dirty_html) {
            require_once APPPATH . 'third_party/htmlpurifier-4.4.0-standalone/HTMLPurifier.standalone.php';

            //defaults for encoding and doctype, if none set
            if (!$encoding) {
                $encoding = 'UTF-8';
            }

            //fix to prevent errors with html5 doctype, purify doesn't yet support html5
            if (!$doctype || $doctype = "html") {
                $doctype = 'HTML 4.01 Transitional';
            }

            $config = HTMLPurifier_Config::createDefault();
            $config->set('Core.Encoding', $encoding);
            $config->set('HTML.Doctype', $doctype);
            $purifier = new HTMLPurifier($config);

            return $purifier->purify($dirty_html);
        } else {
            return false;
        }
    }
}

/* End of html_purifier_helper.php */
/* Location: ./application/helpers/html_purifier_helper.php */