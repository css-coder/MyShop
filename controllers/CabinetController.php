<?php

    class CabinetController
    {

        public function actionIndex()
        {
            // Получаем id пользователя из сессии
            $userId = User::checkLogged();

            // Получаем инфу о пользователе из БД
            $user = User::checkUserById($userId);

            require_once ROOT . '/views/cabinet/index.php';

            return true;
        }

    }