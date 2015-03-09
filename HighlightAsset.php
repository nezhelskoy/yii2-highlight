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
    public $selector = self::DEFAULT_SELECTOR;

    /**
     * @var array of options to be declared as js object with global [configuration](http://highlightjs.readthedocs.org/en/latest/api.html#configure-options)
     */
    public $options = [];

    /**
     * @param View $view
     * @return static the registered asset bundle instance
     */
    public static function register($view)
    {
        $configOptions  = [];
        $configSelector = self::DEFAULT_SELECTOR;
        try {
            $thisBundle = \Yii::$app->getAssetManager()->getBundle(__NAMESPACE__ . "\\" . __CLASS__);
            $configOptions  = $thisBundle->options;
            $configSelector = $thisBundle->selector;
        } catch(\Exception $e) {
            // do nothing...
        }

        $options = empty($configOptions) ? '' : Json::encode($configOptions);

        if ($configSelector !== self::DEFAULT_SELECTOR) {
            $view->registerJs('
                hljs.configure(' . $options . ');
                jQuery(\'' . $configSelector . '\').each(function(i, block) {
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
}
