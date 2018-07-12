<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.07.2018
 * Time: 8:22
 */

namespace app\backend\controllers;

use system\components\Controller;


class CartController extends Controller {

    public function actionIndex(){
        $cartIDs = \system\components\App::call()->cart->getCart();
        $cartProducts = [];
        foreach ($cartIDs as $key => $value) {
            $cartProducts[$key] = [
                'prod' => \system\components\App::call()->ProductRepository->getOne($key),
                'qtty' => $value
            ];
        }
        echo $this->render('cart', ['cartProducts' => $cartProducts]);
    }

    public function actionOrder(){
        $orderList = \system\components\App::call()->cart->getCart();
        $order = new \system\components\App(null, $orderList);
        var_dump($order);
        \system\components\App::call()->OrderRepository->addOrder($order);
        var_dump($order);
        $this->actionIndex();
    }

    public function actionRemove(){
        $id = \system\components\App::call()->request->getParams()['id'];
        $qtty = \system\components\App::call()->request->getParams()['qtty'];

        \system\components\App::call()->cart->removeFromCart([$id => $qtty]);

        $this->actionIndex();
    }
}