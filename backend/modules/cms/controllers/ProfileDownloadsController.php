<?php

namespace backend\modules\cms\controllers;

use Yii;
use common\models\ProfileDownloads;
use common\models\ProfileDownloadsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProfileDownloadsController implements the CRUD actions for ProfileDownloads model.
 */
class ProfileDownloadsController extends Controller {

    public function beforeAction($action) {
        if (!parent::beforeAction($action)) {
            return false;
        }
        if (Yii::$app->user->isGuest) {
            $this->redirect(['/site/index']);
            return false;
        }
        return true;
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProfileDownloads models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ProfileDownloadsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProfileDownloads model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProfileDownloads model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new ProfileDownloads();
        $model->setScenario('create');

        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $image = UploadedFile::getInstance($model, 'image');
            $files = UploadedFile::getInstance($model, 'pdf');
            $model->image = $image->extension;
            $model->pdf = $files->extension;
            if ($model->validate() && $model->save()) {
                $this->Upload($model, $image, $files);
                Yii::$app->session->setFlash('success', "New Profile Downloads added Successfully");
                $model = new ProfileDownloads();
            } else {
                echo 'else';
                exit;
            }
        }return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /*
     * Upload images
     */

    public function Upload($model, $image, $files) {
        $path = Yii::$app->basePath . '/../uploads/profile_downloads/' . $model->id;
        if (!is_dir($path)) {
            mkdir($path);
        }
        if (!empty($image)) {
            $image->saveAs($path . '/profile_image.' . $image->extension);
        }
        if (!empty($files)) {
            $files->saveAs($path . '/profile_download.' . $files->extension);
        }
        return TRUE;
    }

    /**
     * Updates an existing ProfileDownloads model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $image_ = $model->image;
        $files_ = $model->pdf;
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $image = UploadedFile::getInstance($model, 'image');
            $files = UploadedFile::getInstance($model, 'pdf');
            if (!empty($image)){
                $model->image = $image->extension;
            }else{
                $model->image = $image_;
            }
            if (!empty($files)){
                $model->pdf = $files->extension;
            }else{
                $model->pdf = $files_;
            }
            if ($model->validate() && $model->save()) {
                $this->Upload($model, $image, $files);
            }
            Yii::$app->session->setFlash('success', "Profile Downloads Updated Successfully");
            return $this->redirect(['update', 'id' => $model->id]);
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProfileDownloads model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProfileDownloads model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProfileDownloads the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ProfileDownloads::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
