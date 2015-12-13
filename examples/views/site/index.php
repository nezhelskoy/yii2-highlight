<?php

/* @var $this yii\web\View */
/* @var $codeExample string */

nezhelskoy\highlight\HighlightAsset::register($this);

$this->title = 'Yii2 Highlight usage example';
?>
<div class="site-index">
    <h1><?= $this->title ?></h1>
    <p>
        <pre>
            <code class="php"><?= $codeExample ?></code>
        </pre>
    </p>
</div>
