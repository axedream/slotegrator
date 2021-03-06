<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use yii\web\Response;
/**
 * Site controller
 */
class BasicController extends Controller
{
    public $ip = '0.0.0.0';
    public $session;


    /**
     * Блок для формирования Ajax request
     */
    public function init_ajax()
    {
        $this->error = 'yes';
        $this->msg = 'Ошибка. Не определён ни один параметр';
        Yii::$app->response->format = Response::FORMAT_JSON;
    }

    /**
     * Стандартная выдача сообщений
     *
     * @return array
     */
    public function out()
    {
        return ['error'=>$this->error, 'error_type'=>(!empty($this->error_type)) ? $this->error_type : '','msg'=>$this->msg, 'data'=> ($this->error=='no') ? $this->data : '' ];
    }

    /**
     * Базовая инициализация
     */

    public function init(){
        parent::init();
        $this->ip = Yii::$app->request->userIP;
        if (isset(Yii::$app->session)) {
            $this->session = Yii::$app->session;
            if (!$this->session->isActive) {
                $this->session->open();
            }
        }

    }

    public function beforeAction($action)
    {
        $this->init();
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }
}
