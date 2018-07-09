<?php

namespace backend\modules\cms\controllers;

use Yii;
use common\models\Menus;
use common\models\MenusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * MenusController implements the CRUD actions for Menus model.
 */
class MenusController extends Controller {

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
         * Lists all Menus models.
         * @return mixed
         */
        public function actionIndex() {
                $searchModel = new MenusSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return $this->render('index', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                ]);
        }

        /**
         * Displays a single Menus model.
         * @param integer $id
         * @return mixed
         */
        public function actionView($id) {
                return $this->render('view', [
                            'model' => $this->findModel($id),
                ]);
        }

        /**
         * Creates a new Menus model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        public function actionCreate() {
                $model = new Menus();

                $model->setScenario('create');
                if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
                        $image = UploadedFile::getInstance($model, 'image');
                        $model->image = $image->extension;
                        if ($model->validate() && $model->save()) {
                                if (!empty($image)) {
                                        $path = Yii::$app->basePath . '/../uploads/daily-menus/' . $model->id . '/';
                                        $size = [
                                                ['width' => 100, 'height' => 100, 'name' => 'small'],
                                                ['width' => 400, 'height' => 362, 'name' => 'image'],
                                        ];
                                        Yii::$app->UploadFile->UploadFile($model, $image, $path, $size);
                                }
                                Yii::$app->session->setFlash('success', "Added Successfully");
                                return $this->redirect(['index']);
                        }
                }
                return $this->render('create', [
                            'model' => $model,
                ]);
        }

        /**
         * Updates an existing Menus model.
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
                                        $path = Yii::$app->basePath . '/../uploads/daily-menus/' . $model->id . '/';
                                        $size = [
                                                ['width' => 100, 'height' => 100, 'name' => 'small'],
                                                ['width' => 400, 'height' => 362, 'name' => 'image'],
                                        ];
                                        Yii::$app->UploadFile->UploadFile($model, $image, $path, $size);
                                }
                        }
                        Yii::$app->session->setFlash('success', "Updated Successfully");
                        return $this->redirect(['index']);
                }

                return $this->render('update', [
                            'model' => $model,
                ]);
        }

        /**
         * Deletes an existing Menus model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param integer $id
         * @return mixed
         */
        public function actionDelete($id) {
                $model = $this->findModel($id);
                if ($model->delete()) {
                        $directory = Yii::$app->basePath . '/../uploads/daily-menus/' . $model->id;
                        foreach (glob("{$directory}/*") as $file) {
                                if (!is_dir($file)) {
                                        unlink($file);
                                }
                        }
                        FileHelper::removeDirectory($directory);
                }
                return $this->redirect(['index']);
        }

        /**
         * Finds the Menus model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param integer $id
         * @return Menus the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id) {
                if (($model = Menus::findOne($id)) !== null) {
                        return $model;
                } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                }
        }

}
