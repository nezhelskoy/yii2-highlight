<?php
/**
 * @link https://github.com/nezhelskoy/yii2-highlight
 * @copyright Copyright (c) 2014 Dmitry Nezhelskoy
 * @license "BSD-3-Clause"
 */

namespace nezhelskoy\highlight;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Highlight.js library.
 *
 * @author Dmitry Nezhelskoy <dmitry@nezhelskoy.ru>
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
}
