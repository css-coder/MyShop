<?php

    function autoload($class_name) {
        # Список всех каталогов классов в массиве.
        $array_paths = [
            '/models/',
            '/components/'
        ];

        foreach ($array_paths as $path) {
            $path = ROOT . $path . $class_name . '.php';

            if(is_file($path)) {
                include_once $path;
            }
        }
    }

    // Регистрация классов
    spl_autoload_register('autoload');