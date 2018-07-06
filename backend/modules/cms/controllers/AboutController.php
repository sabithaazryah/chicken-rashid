<?php

namespace backend\modules\cms\controllers;

use Yii;
use common\models\About;
use common\models\AboutSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AboutController implements the CRUD actions for About model.
 */
class AboutController extends Controller {
    
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
     * Lists all About models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new AboutSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single About model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new About model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new About();
        $model->setScenario('create');

        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $about_avensia_image = UploadedFile::getInstance($model, 'about_avensia_image');
            $model->about_avensia_image = $about_avensia_image->extension;
            $general_trending_image = UploadedFile::getInstance($model, 'general_trending_image');
            $model->general_trending_image = $general_trending_image->extension;
            $tech_solution_image = UploadedFile::getInstance($model, 'tech_solution_image');
            $model->tech_solution_image = $tech_solution_image->extension;
            $facility_management_image = UploadedFile::getInstance($model, 'facility_management_image');
            $model->facility_management_image = $facility_management_image->extension;
            $it_image = UploadedFile::getInstance($model, 'it_image');
            $model->it_image = $it_image->extension;
            if ($model->validate() && $model->save()) {
                $this->Upload($model, $about_avensia_image, $general_trending_image, $tech_solution_image, $facility_management_image, $it_image);
                Yii::$app->session->setFlash('success', "About Content added Successfully");
            }
        } return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /*
     * Upload images
     */

    public function Upload($model, $about_avensia_image, $general_trending_image, $tech_solution_image, $facility_management_image, $it_image) {
        $path = Yii::$app->basePath . '/../uploads/about/';
        if (!empty($about_avensia_image)) {
            $about_avensia_image->saveAs($path . 'about_avensia_image.' . $about_avensia_image->extension);
        }
        if (!empty($general_trending_image)) {
            $general_trending_image->saveAs($path . 'general_trending_image.' . $general_trending_image->extension);
        }
        if (!empty($tech_solution_image)) {
            $tech_solution_image->saveAs($path . 'tech_solution_image.' . $tech_solution_image->extension);
        }
        if (!empty($facility_management_image)) {
            $facility_management_image->saveAs($path . 'facility_management_image.' . $facility_management_image->extension);
        }
        if (!empty($it_image)) {
            $it_image->saveAs($path . 'it_image.' . $it_image->extension);
        }
        return TRUE;
    }

    /**
     * Updates an existing About model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $about_avensia_image_ = $model->about_avensia_image;
        $general_trending_image_ = $model->general_trending_image;
        $tech_solution_image_ = $model->tech_solution_image;
        $facility_management_image_ = $model->facility_management_image;
        $it_image_ = $model->it_image;

        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $about_avensia_image = UploadedFile::getInstance($model, 'about_avensia_image');
            $general_trending_image = UploadedFile::getInstance($model, 'general_trending_image');
            $tech_solution_image = UploadedFile::getInstance($model, 'tech_solution_image');
            $facility_management_image = UploadedFile::getInstance($model, 'facility_management_image');
            $it_image = UploadedFile::getInstance($model, 'it_image');
            if (!empty($about_avensia_image)) {
                $model->about_avensia_image = $about_avensia_image->extension;
            } else {
                $model->about_avensia_image = $about_avensia_image_;
            }
            if (!empty($general_trending_image)) {
                $model->general_trending_image = $general_trending_image->extension;
            } else {
                $model->general_trending_image = $general_trending_image_;
            }
            if (!empty($tech_solution_image)) {
                $model->tech_solution_image = $tech_solution_image->extension;
            } else {
                $model->tech_solution_image = $tech_solution_image_;
            }
            if (!empty($facility_management_image)) {
                $model->facility_management_image = $facility_management_image->extension;
            } else {
                $model->facility_management_image = $facility_management_image_;
            }
            if (!empty($it_image)) {
                $model->it_image = $it_image->extension;
            } else {
                $model->it_image = $it_image_;
            }
            if ($model->validate() && $model->save()) {
                $this->Upload($model, $about_avensia_image, $general_trending_image, $tech_solution_image, $facility_management_image, $it_image);
                Yii::$app->session->setFlash('success', "About Content Updated Successfully");
            }
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing About model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the About model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return About the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = About::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
