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
     * @var string the options to be declared as js object with global [configuration](http://highlightjs.readthedocs.org/en/latest/api.html#configure-options)
     */
    public static $options = '{}';

    public static function register($view)
    {
        $view->registerJs('hljs.initHighlightingOnLoad(' . self::$options . ');');
        parent::register($view);
    }
}
