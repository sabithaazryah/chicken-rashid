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
use common\models\Slider;
use common\models\About;
use common\models\ProjectGallery;
use common\models\MetaTags;
use common\models\ProductSearch;

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
        $sliders = Slider::find()->where(['status' => 1])->all();
        $about_content = \common\models\IndexAbout::find()->where(['id' => 1])->one();
        $tech_content = \common\models\AvensiaTechContent::find()->where(['id' => 1])->one();
        $facility_managements = \common\models\FacilityManagement::find()->where(['status' => 1])->all();
        $testimonials = \common\models\Testimonial::find()->where(['status' => 1])->orderBy(['DOU' => SORT_DESC])->limit(2)->all();
        $blogs = \common\models\Blog::find(['status' => 1])->orderBy(['DOU' => SORT_DESC])->limit(3)->all();
        $meta_tags = MetaTags::find()->where(['id' => 1])->one();
        $it_data_links = \common\models\ItSevices::find()->where(['status' => 1])->limit(4)->all();
        $technical_data_links = \common\models\TechnicalServices::find()->where(['status' => 1])->limit(4)->all();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('index', [
                    'sliders' => $sliders,
                    'about_content' => $about_content,
                    'testimonials' => $testimonials,
                    'blogs' => $blogs,
                    'tech_content' => $tech_content,
                    'facility_managements' => $facility_managements,
                    'meta_tags' => $meta_tags,
                    'it_data_links' => $it_data_links,
                    'technical_data_links' => $technical_data_links,
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
        $meta_tags = MetaTags::find()->where(['id' => 8])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
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
                    'meta_tags' => $meta_tags,
        ]);
    }

    /*
     * Contact Enguery mail function
     */

    public function sendContactMail($model) {
        $to = "info@avensiauae.com";

        $subject = "Contact Request";

        $message = "
<html>
<head>

</head>
<body>
<table>

<tr>

<th>Name</th>
<th>:-</th>
<td>" . $model->name . "</td>
         </tr>
<tr>

<th>Email</th>
<th>:-</th>
<td>" . $model->email . "</td>
         </tr>

<tr>


<th>Phone No</th>
<th>:-</th>
<td>" . $model->phone . "</td>
         </tr>

<tr>

<th>Message</th>
<th>:-</th>
<td>" . $model->message . "</td>
         </tr>

</table>
</body>
</html>
";

// Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= 'From: <info@avensiauae.com>' . "\r\n";

        mail($to, $subject, $message, $headers);
        return TRUE;
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout() {
        $about_content = About::find()->where(['status' => 1])->one();
        $meta_tags = MetaTags::find()->where(['id' => 2])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('about', [
                    'about_content' => $about_content,
                    'meta_tags' => $meta_tags,
        ]);
    }

    /**
     * Displays GeneralTrading page.
     *
     * @return mixed
     */
    public function actionGeneralTrading($trade = NULL) {
        $general_trading_menus = \common\models\GeneralTrading::find()->where(['status' => 1])->all();
        $it_service_menus = \common\models\ItSevices::find()->where(['status' => 1])->all();
        $technical_service_menus = \common\models\TechnicalServices::find()->where(['status' => 1])->all();
        $facility_service_menus = \common\models\FacilityManagementDetails::find()->where(['status' => 1])->all();
        if (!empty($trade) && $trade != '') {
            $general_traid = \common\models\GeneralTrading::find()->where(['canonical_name' => $trade])->one();
        } else {
            $general_traid = \common\models\GeneralTrading::find()->where(['id' => 1])->one();
        }
        $meta_tags = MetaTags::find()->where(['id' => 3])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['general_trad_id' => $general_traid->id]);
        $dataProvider->pagination->pageSize = 36;
        return $this->render('general-trading', [
                    'general_traid' => $general_traid,
                    'general_trading_menus' => $general_trading_menus,
                    'it_service_menus' => $it_service_menus,
                    'technical_service_menus' => $technical_service_menus,
                    'facility_service_menus' => $facility_service_menus,
                    'meta_tags' => $meta_tags,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays IT page.
     *
     * @return mixed
     */
    public function actionItService($page = NULL) {
        $general_trading_menus = \common\models\GeneralTrading::find()->where(['status' => 1])->all();
        $it_service_menus = \common\models\ItSevices::find()->where(['status' => 1])->all();
        $technical_service_menus = \common\models\TechnicalServices::find()->where(['status' => 1])->all();
        $facility_service_menus = \common\models\FacilityManagementDetails::find()->where(['status' => 1])->all();
        if (!empty($page) && $page != '') {
            $it_service = \common\models\ItSevices::find()->where(['canonical_name' => $page])->one();
        } else {
            $it_service = \common\models\ItSevices::find()->where(['id' => 1])->one();
        }
        $meta_tags = MetaTags::find()->where(['id' => 4])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('it', [
                    'it_service' => $it_service,
                    'general_trading_menus' => $general_trading_menus,
                    'it_service_menus' => $it_service_menus,
                    'technical_service_menus' => $technical_service_menus,
                    'facility_service_menus' => $facility_service_menus,
                    'meta_tags' => $meta_tags,
        ]);
    }

    /**
     * Displays technical service page.
     *
     * @return mixed
     */
    public function actionTechnicalService($page = NULL) {
        $general_trading_menus = \common\models\GeneralTrading::find()->where(['status' => 1])->all();
        $it_service_menus = \common\models\ItSevices::find()->where(['status' => 1])->all();
        $technical_service_menus = \common\models\TechnicalServices::find()->where(['status' => 1])->all();
        $facility_service_menus = \common\models\FacilityManagementDetails::find()->where(['status' => 1])->all();
        if (!empty($page) && $page != '') {
            $technical_service = \common\models\TechnicalServices::find()->where(['canonical_name' => $page])->one();
        } else {
            $technical_service = \common\models\TechnicalServices::find()->where(['id' => 1])->one();
        }
        $meta_tags = MetaTags::find()->where(['id' => 5])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('technical-service', [
                    'technical_service' => $technical_service,
                    'general_trading_menus' => $general_trading_menus,
                    'it_service_menus' => $it_service_menus,
                    'technical_service_menus' => $technical_service_menus,
                    'facility_service_menus' => $facility_service_menus,
                    'meta_tags' => $meta_tags,
        ]);
    }

    /**
     * Displays facility-management page.
     *
     * @return mixed
     */
    public function actionFacilityManagement($page = NULL) {
        $general_trading_menus = \common\models\GeneralTrading::find()->where(['status' => 1])->all();
        $it_service_menus = \common\models\ItSevices::find()->where(['status' => 1])->all();
        $technical_service_menus = \common\models\TechnicalServices::find()->where(['status' => 1])->all();
        $facility_service_menus = \common\models\FacilityManagementDetails::find()->where(['status' => 1])->all();
        if (!empty($page) && $page != '') {
            $facility_service = \common\models\FacilityManagementDetails::find()->where(['canonical_name' => $page])->one();
        } else {
            $facility_service = \common\models\FacilityManagementDetails::find()->where(['id' => 1])->one();
        }
        $meta_tags = MetaTags::find()->where(['id' => 6])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('facility-management', [
                    'facility_service' => $facility_service,
                    'general_trading_menus' => $general_trading_menus,
                    'it_service_menus' => $it_service_menus,
                    'technical_service_menus' => $technical_service_menus,
                    'facility_service_menus' => $facility_service_menus,
                    'meta_tags' => $meta_tags,
        ]);
    }

    /**
     * Displays facility-management page.
     *
     * @return mixed
     */
    public function actionGallery() {
        $gallery_images = ProjectGallery::find()->where(['status' => 1])->all();
        $meta_tags = MetaTags::find()->where(['id' => 7])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('gallery', [
                    'gallery_images' => $gallery_images,
                    'meta_tags' => $meta_tags,
        ]);
    }

    /**
     * Displays blog page.
     *
     * @return mixed
     */
    public function actionBlog() {
        $meta_tags = MetaTags::find()->where(['id' => 9])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        $blogs = \common\models\Blog::find()->where(['status' => 1])->all();
        return $this->render('blog', [
                    'blogs' => $blogs,
                    'meta_tags' => $meta_tags,
        ]);
    }

    /**
     * Displays blog details page.
     *
     * @return mixed
     */
    public function actionBlogDetails($id) {
        $meta_tags = MetaTags::find()->where(['id' => 9])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        $blog_detail = \common\models\Blog::find()->where(['id' => $id])->one();
        $blogs = \common\models\Blog::find()->where(['status' => 1])->orderBy(['DOU' => SORT_DESC])->limit(15)->all();
        return $this->render('blog-details', [
                    'blog_detail' => $blog_detail,
                    'blogs' => $blogs,
                    'meta_tags' => $meta_tags,
        ]);
    }

    /**
     * Displays site map page.
     *
     * @return mixed
     */
    public function actionSiteMap() {
        $meta_tags = MetaTags::find()->where(['id' => 8])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('sitemap', [
                    'meta_tags' => $meta_tags,
        ]);
    }

    /**
     * Displays Download Page.
     *
     * @return mixed
     */
    public function actionDownloads() {
        $meta_tags = MetaTags::find()->where(['id' => 11])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        $downloads = \common\models\ProfileDownloads::find()->all();
        return $this->render('downloads', [
                    'meta_tags' => $meta_tags,
                    'downloads' => $downloads,
        ]);
    }

    /**
     * Displays Our Clients Page.
     *
     * @return mixed
     */
    public function actionOurClients() {
        $meta_tags = MetaTags::find()->where(['id' => 12])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        $clients = \common\models\OurClient::find()->where(['status' => 1])->all();
        return $this->render('our_clients', [
                    'meta_tags' => $meta_tags,
                    'clients' => $clients,
        ]);
    }
    
    /*
     * Display IT Products Page
     */
    
    public function actionItProducts() {
        $general_trading_menus = \common\models\GeneralTrading::find()->where(['status' => 1])->all();
        $it_service_menus = \common\models\ItSevices::find()->where(['status' => 1])->all();
        $technical_service_menus = \common\models\TechnicalServices::find()->where(['status' => 1])->all();
        $facility_service_menus = \common\models\FacilityManagementDetails::find()->where(['status' => 1])->all();
        $searchModel = new \common\models\ItProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['status' => 1]);
        $dataProvider->pagination->pageSize = 36;
        $meta_tags = MetaTags::find()->where(['id' => 4])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('it-products', [
                    'general_trading_menus' => $general_trading_menus,
                    'it_service_menus' => $it_service_menus,
                    'technical_service_menus' => $technical_service_menus,
                    'facility_service_menus' => $facility_service_menus,
                    'meta_tags' => $meta_tags,
            'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
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

}
