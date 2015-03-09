<?php
/**
 * @author Dmitry Nezhelskoy <dmitry@nezhelskoy.ru>
 * @link https://github.com/nezhelskoy/yii2-highlight
 * @copyright Copyright (c) 2014 Dmitry Nezhelskoy
 * @license "BSD-3-Clause"
 */

namespace nezhelskoy\highlight;

use yii\web\AssetBundle;
use yii\web\View;
use yii\helpers\Json;

/**
 * Asset bundle for the Highlight.js library.
 */
class HighlightAsset extends AssetBundle
{
    const DEFAULT_SELECTOR = 'pre code';

    public $sourcePath = '@vendor/nezhelskoy/yii2-highlight/';
    public $css = [
        'dist/styles/default.css',
    ];
    public $js = [
        'dist/highlight.pack.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

    /**
     * @var string Preferred selector on which code Highlight would be applied.
     */
    public static $selector = self::DEFAULT_SELECTOR;

    /**
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

        if (self::$selector !== self::DEFAULT_SELECTOR) {
            $view->registerJs('
                hljs.configure(' . $options . ');
                jQuery(\'' . self::$selector . '\').each(function(i, block) {
                    hljs.highlightBlock(block);
                });');
        } else {
            $view->registerJs('
                hljs.configure(' . $options . ');
                hljs.initHighlightingOnLoad();',
                View::POS_END
            );
        }

        return parent::register($view);
    }

    /**
     * Setter for static $options property. Makes this property to be confugurable.
     * @param array $options
     */
    public function setOptions($options) {
        self::$options = $options;
    }

    /**
     * Setter for static $selector property. Makes this property to be confugurable.
     * @param string $selector
     */
    public function setSelector($selector) {
        self::$selector = $selector;
    }
}
