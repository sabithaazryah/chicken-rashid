<?php

namespace backend\modules\cms\controllers;

use Yii;
use common\models\GeneralTrading;
use common\models\GeneralTradingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * GeneralTradingController implements the CRUD actions for GeneralTrading model.
 */
class GeneralTradingController extends Controller {
    
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
     * Lists all GeneralTrading models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GeneralTradingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GeneralTrading model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GeneralTrading model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new GeneralTrading();
        $model->setScenario('create');

        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $image = UploadedFile::getInstance($model, 'image');
            $model->image = $image->extension;
            if ($model->validate() && $model->save()) {
                if (!empty($image)) {
                    $path = Yii::$app->basePath . '/../uploads/general_trading/' . $model->id . '/';
                    if ($model->id == 1 || $model->id == 2 || $model->id == 3) {
                        $size = [
                                ['width' => 100, 'height' => 100, 'name' => 'small'],
                                ['width' => 750, 'height' => 827, 'name' => 'image'],
                        ];
                    }
                    if ($model->id == 4 || $model->id == 5) {
                        $size = [
                                ['width' => 100, 'height' => 100, 'name' => 'small'],
                                ['width' => 750, 'height' => 439, 'name' => 'image'],
                        ];
                    }
                    Yii::$app->UploadFile->UploadFile($model, $image, $path, $size);
                }
                Yii::$app->session->setFlash('success', "New general trading added Successfully");
                $model = new GeneralTrading();
            }
        }return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing GeneralTrading model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $image_ = $model->image;

        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $image = UploadedFile::getInstance($model, 'image');
            if (!empty($image))
                $model->image = $image->extension;
            else
                $model->image = $image_;
            if ($model->validate() && $model->save()) {
                if (!empty($image)) {
                    $path = Yii::$app->basePath . '/../uploads/general_trading/' . $model->id . '/';
                    if ($model->id == 1 || $model->id == 2 || $model->id == 3) {
                        $size = [
                                ['width' => 100, 'height' => 100, 'name' => 'small'],
                                ['width' => 750, 'height' => 827, 'name' => 'image'],
                        ];
                    }
                    if ($model->id == 4 || $model->id == 5) {
                        $size = [
                                ['width' => 100, 'height' => 100, 'name' => 'small'],
                                ['width' => 750, 'height' => 439, 'name' => 'image'],
                        ];
                    }
                    Yii::$app->UploadFile->UploadFile($model, $image, $path, $size);
                }
            }
            Yii::$app->session->setFlash('success', "General Trading Updated Successfully");
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GeneralTrading model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GeneralTrading model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GeneralTrading the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = GeneralTrading::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
