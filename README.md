# Yii2 highlight.js extension

### Install via Composer

In "composer.json" your project, add the section "require" the following line:

~~~
    "require": {
        ...
        "nezhelskoy/yii2-highlight": "*"
    },
~~~

Then update your project:

~~~
php composer.phar update --prefer-dist
~~~

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

## License

yii2-highlight is released under the BSD License. See [LICENSE.md](https://github.com/nezhelskoy/yii2-highlight/blob/master/LICENSE.md) file for
details.

## Links

The official site for the Highlight.js library is at <https://highlightjs.org/>.
