<?php

namespace nezhelskoy\highlight\examples\controllers;

use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $codeExample = file_get_contents(Yii::getAlias('@app') . '/../src/HighlightAsset.php');
        $codeExample = ltrim($codeExample, "<?php\n");
        return $this->render('index', [
            'codeExample' => $codeExample,
        ]);
    }
}
