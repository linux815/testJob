<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\modules\admin\models\LoginForm;
use app\modules\admin\models\Author;
use app\modules\admin\models\Book;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\web\HttpException;

class AuthorController extends Controller
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

    public function actionAllauthor()
    {
        $query   = new Query;
        $query->select('book.*, COUNT(book.id) as count, author.id, author.firstname, author.lastName, author.pseudonym')
                ->from('author')
                ->leftJoin('book', 'book.author_id = author.id')
                ->where('')
                ->groupBy('author.id')
                ->all();
        $command = $query->createCommand();
        $data    = $command->queryAll();

        if (\Yii::$app->user->isGuest) {
            return $this->redirect('login');
        } else {
            return $this->render('author', array(
                        'data' => $data
            ));
        }
    }

    public function actionRead($id = NULL)
    {
        if ($id === NULL) {
            return $this->redirect('allauthor');
        }

        $data = Author::find()->where('id = ' . $id)->one();

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
            return $this->redirect('allauthor');
        }

        $data = Author::find()->where('id = ' . $id)->one();


        if ($data === NULL) {
            Yii::$app->session->setFlash('DeletedError');
            Yii::$app->getResponse()->redirect(array('admin/author/allauthor'));
        }

        $data->delete();
        Book::deleteAll('author_id = :id', [':id' => $id]);

        Yii::$app->session->setFlash('DeletedDone');
        Yii::$app->getResponse()->redirect(array('admin/author/allauthor'));
    }

    public function actionCreate()
    {
        $model = new Author;

        $model->attributes = \Yii::$app->request->post('add-form');

        if (isset($_POST['Author'])) {
            $model->firstName = $_POST['Author']['firstName'];
            $model->lastname  = $_POST['Author']['lastname'];
            $model->pseudonym = $_POST['Author']['pseudonym'];

            $model->save();
            return $this->redirect('allauthor');
        }

        echo $this->render('create', array(
            'model' => $model
        ));
    }

    public function actionUpdate($id = NULL)
    {
        if ($id === NULL) {
            return $this->redirect('allauthor');
        }

        $model = Author::find()->where('id = ' . $id)->one();

        if ($model === NULL) {
            throw new HttpException(404, 'Sorry :( Document Does Not Exist');
        }

        if (isset($_POST['Author'])) {
            $model->firstName = $_POST['Author']['firstName'];
            $model->lastname  = $_POST['Author']['lastname'];
            $model->pseudonym = $_POST['Author']['pseudonym'];

            $model->save();
            return $this->redirect('/admin/author/allauthor');
        }

        echo $this->render('create', array(
            'model' => $model
        ));
    }

}
