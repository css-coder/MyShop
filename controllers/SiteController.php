<?php

    class SiteController
    {

        public function actionIndex()
        {
            $categories = array();
            $categories = Category::getCategoriesList();

            // Вывод последних товаров на главной
            $latestProducts = array();
            $latestProducts = Product::getLatestProducts(6);

            require_once ROOT . '/views/site/index.php';
            return true;
        }

	    public function actionContacts()
	    {
		    $userEmail = '';
		    $userText = '';
		    $userSubject = '';
		    $result = false;

		    if (isset($_POST['submit'])) {
				$userEmail = $_POST['userEmail'];
				$userText = $_POST['userText'];
				$userSubject = $_POST['userSubject'];

				$errors = false;

				if (!User::checkEmail($userEmail)) {
					$errors[] = 'Не правильный email!!!';
			    }

			    if ($errors == false) {
				    $adminEmail = 'l.e.g.i.o.n@inbox.ru';
				    $subject = $userSubject;
				    $message = "Содержание письма: {$userText}. от {$userEmail}";
				    $result = mail($adminEmail, $subject, $message);
				    $result = true;
			    }
		    }

		    require_once ROOT . '/views/site/contacts.php';
		    return true;
	    }

    }