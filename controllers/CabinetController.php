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

        public function actionEdit()
        {
            // Получаем id пользователя из сессии
            $userId = User::checkLogged();

            // Получаем инфу о пользователе из БД
            $user = User::checkUserById($userId);

            $name = $user['user_name'];
            $password = $user['password'];

            $result = false;

            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $password = $_POST['password'];

                $errors = false;

                // Валидация полей
                if (!User::checkName($name)) {
                    $errors[] = 'Имя не должно быть короче 2х символов';
                }

                if (!User::checkPassword($password)) {
                    $errors[] = 'Пароль не должен быть короче 6-ти символов';
                }

                if ($errors === false) {
                    $result = User::edit($userId, $name, $password);
                }

            }

            require_once ROOT . '/views/cabinet/edit.php';

            return true;
        }

    }