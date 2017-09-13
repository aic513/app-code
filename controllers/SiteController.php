<?php

namespace app\controllers;

use Yii;
use app\models\Fragments;
use yii\filters\AccessControl;
use yii\mongodb\Query;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            $fragments = Fragments::find()->where(['private' => '0'])->orderBy(['create_at' => SORT_DESC])->limit(10)->all();
        } else {
            $fragments1 = Fragments::find()->where(['private' => '0'])->all();
            $fragments2 = Fragments::find()->where(['user_id' => Yii::$app->user->identity->_id])->all();
            $fragments  = array_merge($fragments1, $fragments2);
        }

        return $this->render('index', compact('fragments'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', ['model' => $model,]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /*
     * Create new fragment
     */
    public function actionCreate()
    {
        $model = new Fragments();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        } else {
            return $this->render('create', ['model' => $model,]);
        }
    }

     /*
     * View fragment
     */

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /*
     * Find fragment by id
     */
    protected function findModel($id)
    {
        if (($model = Fragments::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested fragment does not exist.');
        }
    }

}
