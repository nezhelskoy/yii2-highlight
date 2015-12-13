# Yii2 highlight.js extension

### Installation

The preferred way to install this extension is through [composer](https://getcomposer.org/).

Either run

~~~
php composer.phar require --prefer-dist nezhelskoy/yii2-highlight "*"
~~~

Or add

~~~
"nezhelskoy/yii2-highlight": "*"
~~~

to the require section of your `composer.json` file.

### Usage

In your view script register asset:

~~~php
nezhelskoy\highlight\HighlightAsset::register($this);
~~~

And manage content, as described in original [highlight.js documentation](https://highlightjs.org/usage/):

~~~html
<pre><code class="html">...</code></pre>
~~~

You can override style in your config file, e.g. `config/web.php`:

~~~php
    'components' => [
        ...
        'assetManager' => [
            'bundles' => [
                'nezhelskoy\highlight\HighlightAsset' => [
                    'css' => ['dist/styles/zenburn.css'],
                ],
            ]
        ],
        ...
    ],
~~~

Example of custom cofiguraton of `selector` or `options` properties

~~~php
    'components' => [
        ...
        'assetManager' => [
            'bundles' => [
                'nezhelskoy\highlight\HighlightAsset' => [
                    'selector' => '.is-highlighted',
                    'options' => [
                        'classPrefix' => 'custom-',
                        'useBR' => true,
                    ],
                    'css' => ['dist/styles/zenburn.css'],
                ],
            ]
        ],
        ...
    ],
~~~

Using of custom build, located in `/js/highlight`, for example

~~~php
    'components' => [
        ...
        'assetManager' => [
            'bundles' => [
                'nezhelskoy\highlight\HighlightAsset' => [
                    'sourcePath' => null,
                    'css' => ['/js/highlight/styles/zenburn.css'],
                    'js' => ['/js/highlight/highlight.pack.js'],
                ],
            ]
        ],
        ...
    ],
~~~

## License

yii2-highlight is released under the BSD License. See [LICENSE.md](https://github.com/nezhelskoy/yii2-highlight/blob/master/LICENSE.md) file for
details.

## Links

The official site for the Highlight.js library is at <https://highlightjs.org/>.
