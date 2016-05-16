<?php

namespace app\controllers;

use Yii;
use app\models\GenerateForm;
use app\models\Cards;
use app\models\CardsSearch;
 use app\models\Student; 
use app\models\Generator;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CardsController implements the CRUD actions for Cards model.
 */
class CardsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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
     * Lists all Cards models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CardsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cards model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

 	
	    public function actionGenerate()
    {
        $model = new GenerateForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
		 
			if(Generator::generateFromModel($model)->save())
			{
				Yii::$app->session->setFlash("success", "Codes was successfully generated");
			}
	     return $this->redirect(['index']);
		 
        } else {
            return $this->render('generate', [
                'model' => $model,
            ]);
        }
    }
	
	
	
	 

    /**
     * Updates an existing Cards model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
	 
	 /*
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

	
	*/
    /**
     * Deletes an existing Cards model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	 
	   public function actionDisable($id)
    {
        $model = $this->findModel($id);
		$model->active=$model->active ? '0':'1';
		$model->save();
		return $this->redirect(['view', 'id' => $model->id]);
    }
	
	   public function actionStatus($id,$page=1)
    {
        $model = $this->findModel($id);
	    $model->active;
		$model->active=$model->active ? '0':'1';
		$model->save();
		return $this->redirect(['index', 'page' => $page]);
    }
 

    /**
     * Finds the Cards model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cards the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cards::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
