<?php

namespace app\controllers;

use app\models\Events;
use app\models\Organization;
use app\models\EventsOrganization;
use app\models\EventsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EventController implements the CRUD actions for Events model.
 */
class EventController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Events models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EventsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Events model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Events model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Events();
		$organization = Organization::find()->all();

        if ($this->request->isPost) {
			
			/*
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
			*/
			
			$data = $this->request->post();
			
			$model->title = (string) $data['title'];
			$model->date = (string) strtotime($data['date']);
			$model->body = (string) $data['body'];
			$model->save();
			
			foreach($data['organization'] as $item) {
				$link = new EventsOrganization();
				$link->organization_id = $item;
				$link->events_id = $model->id;
				$link->save();
			}
			
			return $this->redirect(['view', 'id' => $model->id]);
			
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
			'organization' => $organization,
        ]);
    }

    /**
     * Updates an existing Events model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$organization = Organization::find()->all();
		$cheked = EventsOrganization::find()->select('organization_id')->where(['events_id' => $model->id])->indexBy('organization_id')->column();
		
		
		/*
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
		*/
		
		if ($this->request->isPost) {
			$data = $this->request->post();
			
			$model->title = (string) $data['title'];
			$model->date = (string) strtotime($data['date']);
			$model->body = (string) $data['body'];
			$model->save();
			
			foreach($data['organization'] as $item) {
				EventsOrganization::deleteAll(['events_id' => $model->id]);
				$link = new EventsOrganization();
				$link->organization_id = $item;
				$link->events_id = $model->id;
				$link->save();
			}
			
			return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
			'organization' => $organization,
			'cheked' => $cheked,
        ]);
    }

    /**
     * Deletes an existing Events model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Events model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Events the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Events::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
