<?php

    class User
    {
        /**
         * Регистрация пользователя
         * @param type $name
         * @param type $email
         * @param type $password
         * @return type
         */
        public static function register($name, $email, $password)
        {
            $db = Db::getConnection();

            $sql = 'INSERT INTO user (user_name, email, password) VALUES (:user_name, :email, :password)';

            $result = $db->prepare($sql);
            $result->bindParam(':user_name', $name, PDO::PARAM_STR);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->bindParam(':password', $password, PDO::PARAM_STR);

            return $result->execute();

        }

        /**
         * Проверяет имя: не меньше, чем 3 символа
         */
        public static function checkName($name)
        {
            if (strlen($name) >= 2) {
                return true;
            }
            return false;
        }

        /**
         * Проверяет пароль: не меньше, чем 6 символов
         */
        public static function checkPassword($password)
        {
            if (strlen($password) >= 6) {
                return true;
            }
            return false;
        }

        /**
         * Проверяет email
         */
        public static function checkEmail($email)
        {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            }
            return false;
        }

        /**
         * Проверяет есть ли email в базе
         */
        public static function checkEmailExists($email)
        {
            $db = Db::getConnection();

            $sql = ('SELECT COUNT(*) FROM user WHERE email = :email');

            $result = $db->prepare($sql);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->execute();

            if ($result->fetchColumn()) {
                return true;
            }

            return false;
        }

        /**
         * Проверяет есть ли имя в базе
         */
        public static function checkNameExists($name)
        {
            $db = Db::getConnection();

            $sql = ('SELECT COUNT(*) FROM user WHERE user_name = :user_name');

            $result = $db->prepare($sql);
            $result->bindParam(':user_name', $name, PDO::PARAM_STR);
            $result->execute();

            if ($result->fetchColumn())
                return true;

            return false;
        }

        /**
         * Проверяем существует ли пользователь с заданными $email и $password
         * @param string $email
         * @param string $password
         * @return mixed : ingeger user id or false
         */
        public static function checkUserData($email, $password)
        {
            $db = Db::getConnection();

            $sql = ('SELECT * FROM user WHERE email = :email AND password = :password');

            $result = $db->prepare($sql);
            $result->bindParam(':email', $email, PDO::PARAM_INT);
            $result->bindParam(':password', $password, PDO::PARAM_INT);
            $result->execute();

            $user = $result->fetch();
            if ($user) {
                return $user['id'];
            }

            return false;
        }

        /**
         * Запоминаем пользователя
         * @param string $email
         * @param string $password
         */
        public static function auth($userId)
        {
            $_SESSION['user'] = $userId;
        }

        public static function checkLogged()
        {
            // Если сессия есть, вернем идентификатор пользователя
            if (isset($_SESSION['user'])) {
                return $_SESSION['user'];
            }

            header("Location: /user/login");
        }

        public static function isGuest()
        {
            if (isset($_SESSION['user'])) {
                return false;
            }
            return true;
        }

        public static function checkUserById($id)
        {
            if($id) {
                $db = Db::getConnection();
                $sql = ('SELECT * FROM user WHERE id = :id');

                $result = $db->prepare($sql);
                $result->bindParam(':id', $id, PDO::PARAM_INT);

                // Указываем что хотим получить данные в виде массива
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $result->execute();

                return $result->fetch();
            }
        }

        /**
         * Редактирование данных пользователя
         * @param string $name
         * @param string $password
         */
        public static function edit($id, $name, $password)
        {
            $db = Db::getConnection();

            $sql = ('UPDATE user SET user_name = :user_name, password = :password WHERE id = :id');

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->bindParam(':user_name', $name, PDO::PARAM_STR);
            $result->bindParam(':password', $password, PDO::PARAM_STR);
            return $result->execute();
        }
    }