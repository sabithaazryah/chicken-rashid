<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;

/**
 * Site controller
 */
class SiteController extends Controller {

        /**
         * {@inheritdoc}
         */
        public function behaviors() {
                return [
                    'access' => [
                        'class' => AccessControl::className(),
                        'only' => ['logout', 'signup'],
                        'rules' => [
                                [
                                'actions' => ['signup'],
                                'allow' => true,
                                'roles' => ['?'],
                            ],
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
         * {@inheritdoc}
         */
        public function actions() {
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
         * @return mixed
         */
        public function actionIndex() {

//                $meta_tags = MetaTags::find()->where(['id' => 1])->one();
//
//                \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
//                \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
                return $this->render('index', [
                ]);
        }

        public function actionMenus() {
                $contact = new \common\models\ContactForm();
                $menus = \common\models\Menus::find()->where(['status' => 1])->all();
                return $this->render('menus', [
                            'menus' => $menus,
                            'contact' => $contact,
                ]);
        }

        /**
         * Logs in a user.
         *
         * @return mixed
         */
        public function actionLogin() {
                if (!Yii::$app->user->isGuest) {
                        return $this->goHome();
                }

                $model = new LoginForm();
                if ($model->load(Yii::$app->request->post()) && $model->login()) {
                        return $this->goBack();
                } else {
                        $model->password = '';

                        return $this->render('login', [
                                    'model' => $model,
                        ]);
                }
        }

        /**
         * Logs out the current user.
         *
         * @return mixed
         */
        public function actionLogout() {
                Yii::$app->user->logout();
                return $this->goHome();
        }

        /**
         * Displays contact page.
         *
         * @return mixed
         */
        public function actionContact() {
                $contact_addresses = \common\models\ContactAddress::find()->all();
                $model = new \common\models\ContactForm();
//                $meta_tags = MetaTags::find()->where(['id' => 8])->one();
//                \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
//                \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
                if ($model->load(Yii::$app->request->post())) {
                        $model->date = date('Y-m-d');
                        if ($model->save()) {
                                $this->sendContactMail($model);
                                Yii::$app->session->setFlash('success', 'Your contact request send successfully.');
                                $model = new \common\models\ContactForm();
                        }
                }
                return $this->render('contact', [
                            'contact_addresses' => $contact_addresses,
//                            'meta_tags' => $meta_tags,
                ]);
        }

        /**
         * Signs user up.
         *
         * @return mixed
         */
        public function actionSignup() {
                $model = new SignupForm();
                if ($model->load(Yii::$app->request->post())) {
                        if ($user = $model->signup()) {
                                if (Yii::$app->getUser()->login($user)) {
                                        return $this->goHome();
                                }
                        }
                }

                return $this->render('signup', [
                            'model' => $model,
                ]);
        }

        /**
         * Requests password reset.
         *
         * @return mixed
         */
        public function actionRequestPasswordReset() {
                $model = new PasswordResetRequestForm();
                if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                        if ($model->sendEmail()) {
                                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                                return $this->goHome();
                        } else {
                                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
                        }
                }

                return $this->render('requestPasswordResetToken', [
                            'model' => $model,
                ]);
        }

        /**
         * Resets password.
         *
         * @param string $token
         * @return mixed
         * @throws BadRequestHttpException
         */
        public function actionResetPassword($token) {
                try {
                        $model = new ResetPasswordForm($token);
                } catch (InvalidParamException $e) {
                        throw new BadRequestHttpException($e->getMessage());
                }

                if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
                        Yii::$app->session->setFlash('success', 'New password saved.');

                        return $this->goHome();
                }

                return $this->render('resetPassword', [
                            'model' => $model,
                ]);
        }

        public function actionMenuenquiry() {
                $model = new \common\models\ContactForm();
                $model->item_id = Yii::$app->request->post('cart_item');
                $model->type = Yii::$app->request->post('type');
                $model->name = Yii::$app->request->post('name');
                $model->email = Yii::$app->request->post('email');
                $model->phone = Yii::$app->request->post('phone_no');
                $model->message = Yii::$app->request->post('message');
                $model->save();
                $this->Sendmail($model);
                Yii::$app->session->setFlash('success', 'Enquiry submitted successfully');
                return $this->redirect(Yii::$app->request->referrer);
        }

        public function Sendmail($model) {

                $to = "sabitha@azryah.com";
                $subject = "Enquiry";
                $message = $this->renderPartial('contact-mail', ['model' => $model]);
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <info@chickenrashid.com>' . "\r\n";
                mail($to, $subject, $message, $headers);
        }

}
