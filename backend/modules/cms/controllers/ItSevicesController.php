<?php

namespace backend\modules\cms\controllers;

use Yii;
use common\models\ItSevices;
use common\models\ItSevicesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ItSevicesController implements the CRUD actions for ItSevices model.
 */
class ItSevicesController extends Controller {

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
     * Lists all ItSevices models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ItSevicesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ItSevices model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ItSevices model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new ItSevices();

        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $image = UploadedFile::getInstance($model, 'image');
            $partners_files = UploadedFile::getInstances($model, 'our_partners');
            $project_gallery_files = UploadedFile::getInstances($model, 'project_gallery');
            if (!empty($image)) {
                $model->image = $image->extension;
            }
            if ($model->validate() && $model->save()) {
                if (!empty($image)) {
                    $path = Yii::$app->basePath . '/../uploads/it/services/' . $model->id . '/';
                    $size = [
                        ['width' => 100, 'height' => 100, 'name' => 'small'],
                        ['width' => 750, 'height' => 537, 'name' => 'image'],
                    ];
                    Yii::$app->UploadFile->UploadFile($model, $image, $path, $size);
                }
                if (!empty($partners_files)) {
                    $this->Upload($partners_files, $model, 1);
                }
                if (!empty($project_gallery_files)) {
                    $this->Upload($project_gallery_files, $model, 2);
                }
                Yii::$app->session->setFlash('success', "IT service added Successfully");
                $model = new ItSevices();
            }
        }return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function Upload($files, $model, $type) {
        if ($files != '' && $model != '') {
            if ($type == 1) {
                $folder = 'partners';
            } else {
                $folder = 'project_gallery';
            }
            $paths = Yii::$app->basePath . '/../uploads/it/' . $folder . '/' . $model->id;
            $path = $this->CheckPath($paths);
            foreach ($files as $file) {
                $name = $this->fileExists($path, $file->baseName . '.' . $file->extension, $file, 1);
                $file->saveAs($path . '/' . $name);
            }
        }
        return TRUE;
    }

    public function CheckPath($paths) {
        if (!is_dir($paths)) {
            mkdir($paths);
        }
        return $paths;
    }

    public function fileExists($path, $name, $file, $sufix) {
        if (file_exists($path . '/' . $name)) {

            $name = basename($path . '/' . $file->baseName, '.' . $file->extension) . '_' . $sufix . '.' . $file->extension;
            return $this->fileExists($path, $name, $file, $sufix + 1);
        } else {
            return $name;
        }
    }

    public function actionRemove($path) {
        $img_path = Yii::$app->basePath . '/../uploads/' . $path;
        if (file_exists($img_path)) {
            unlink($img_path);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionRemoveDirectory($id) {
        $model = $this->findModel($id);
        $img_path = Yii::$app->basePath . '/../uploads/it/services/' . $id;
        if (is_dir($img_path)) {
            foreach (glob("{$img_path}/*") as $file) {
                unlink($file);
            }
            if(rmdir($img_path)){
                if(!empty($model)){
                    $model->image = '';
                    $model->update();
                }
            }
        } 
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Updates an existing ItSevices model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $image_ = $model->image;

        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $image = UploadedFile::getInstance($model, 'image');
            $partners_files = UploadedFile::getInstances($model, 'our_partners');
            $project_gallery_files = UploadedFile::getInstances($model, 'project_gallery');
            if (!empty($image))
                $model->image = $image->extension;
            else
                $model->image = $image_;
            if ($model->validate() && $model->save()) {
                if (!empty($image)) {
                    $path = Yii::$app->basePath . '/../uploads/it/services/' . $model->id . '/';
                    $size = [
                        ['width' => 100, 'height' => 100, 'name' => 'small'],
                        ['width' => 750, 'height' => 537, 'name' => 'image'],
                    ];
                    Yii::$app->UploadFile->UploadFile($model, $image, $path, $size);
                }
                if (!empty($partners_files)) {
                    $this->Upload($partners_files, $model, 1);
                }
                if (!empty($project_gallery_files)) {
                    $this->Upload($project_gallery_files, $model, 2);
                }
            }
            Yii::$app->session->setFlash('success', "IT service updated Successfully");
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ItSevices model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ItSevices model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ItSevices the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ItSevices::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
