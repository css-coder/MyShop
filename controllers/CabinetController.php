<?php

    class CabinetController
    {

        public function actionIndex()
        {
            $userId = User::checkLogged();
            $user = User::checkName();

            echo $userId;

            require_once ROOT . '/views/cabinet/index.php';

            return true;
        }

    }