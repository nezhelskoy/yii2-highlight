<?php
/**
 * @author Dmitry Nezhelskoy <dmitry@nezhelskoy.ru>
 * @link https://github.com/nezhelskoy/yii2-highlight
 * @copyright Copyright (c) 2014 Dmitry Nezhelskoy
 * @license "BSD-3-Clause"
 */

namespace nezhelskoy\highlight;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Highlight.js library.
 */
class HighlightAsset extends AssetBundle
{
    public $sourcePath = '@vendor/nezhelskoy/yii2-highlight/';
    public $css = [
        'dist/styles/default.css',
    ];
    public $js = [
        'dist/highlight.pack.js',
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];

    /*
     * @var string Preferred selector on which code Highlight would be applied.
     */
    public static $selector = 'pre code';

    /*
     * @var array of options to be declared as js object with global [configuration](http://highlightjs.readthedocs.org/en/latest/api.html#configure-options)
     */
    public static $options = [];

    /**
     * @param View $view
     * @return static the registered asset bundle instance
     */
    public static function register($view)
    {
        $options = empty(self::$options) ? '' : Json::encode(self::$options);

        if (self::$selector != 'pre code') {
            $js = '
                hljs.configure('.$options.');
                jQuery(\''.self::$selector.'\').each(function(i, block) {
                    hljs.highlightBlock(block);
                });
                ';
        } else {
            $js = 'hljs.initHighlightingOnLoad(' . $options . ');';
        }
        $view->registerJs($js);
        return parent::register($view);
    }

    /**
     * Required setter by Yii's Dependency Injection to work properly.
     * @param array $options
     */
    public function setOptions($options) {
        self::$options = $options;
    }

    /**
     * Required setter by Yii's Dependency Injection to work properly.
     * @param string $selector
     */
    public function setSelector($selector) {
        self::$selector = $selector;
    }
}
