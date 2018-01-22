<?php

    class UserController
    {
        public function actionLogin()
        {

            require_once ROOT . '/views/user/login.php';

            return true;
        }
    }