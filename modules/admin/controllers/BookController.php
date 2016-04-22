<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\modules\admin\models\LoginForm;
use app\modules\admin\models\Book;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\web\HttpException;

class BookController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect('index');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('index');
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('index');
    }

    public function actionAllbook()
    {
        $query   = new Query;
        $query->select('book.*, author.firstname, author.lastName, author.pseudonym')
                ->from('book')
                ->leftJoin('author', 'book.author_id = author.id')
                ->all();
        $command = $query->createCommand();
        $data    = $command->queryAll();

        if (\Yii::$app->user->isGuest) {
            return $this->redirect('login');
        } else {
            return $this->render('book', array(
                        'data' => $data
            ));
        }
    }

    public function actionRead($id = NULL)
    {
        if ($id === NULL) {
            return $this->redirect('allbook');
        }

        $data = Book::find()->where('id = ' . $id)->one();

        if ($data === NULL) {
            throw new HttpException(404, 'Sorry :( Document Does Not Exist');
        }

        echo $this->render('read', array(
            'data' => $data
        ));
    }

    public function actionDelete($id = NULL)
    {
        if ($id === NULL) {
            Yii::$app->session->setFlash('DeletedError');
            return $this->redirect('allbook');
        }

        $data = Book::find()->where('id = ' . $id)->one();


        if ($data === NULL) {
            Yii::$app->session->setFlash('DeletedError');
            Yii::$app->getResponse()->redirect(array('admin/book/allbook'));
        }

        $data->delete();

        Yii::$app->session->setFlash('DeletedDone');
        Yii::$app->getResponse()->redirect(array('admin/book/allbook'));
    }

    public function actionCreate()
    {
        $model = new Book;

        $model->attributes = \Yii::$app->request->post('add-form');

        if (isset($_POST['Book'])) {
            $model->title     = $_POST['Book']['title'];
            $model->text      = $_POST['Book']['text'];
            $model->year      = $_POST['Book']['year'];
            $model->author_id = $_POST['Book']['author_id'];

            $model->save();
            return $this->redirect('allbook');
        }

        echo $this->render('create', array(
            'model' => $model
        ));
    }

    public function actionUpdate($id = NULL)
    {
        if ($id === NULL) {
            return $this->redirect('allbook');
        }

        $model = Book::find()->where('id = ' . $id)->one();

        if ($model === NULL) {
            throw new HttpException(404, 'Sorry :( Document Does Not Exist');
        }

        if (isset($_POST['Book'])) {
            $model->title     = $_POST['Book']['title'];
            $model->text      = $_POST['Book']['text'];
            $model->year      = $_POST['Book']['year'];
            $model->author_id = $_POST['Book']['author_id'];

            $model->save();
            return $this->redirect('/admin/book/allbook');
        }

        echo $this->render('create', array(
            'model' => $model
        ));
    }

}
