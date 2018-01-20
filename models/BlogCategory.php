<?php

    class BlogCategory
    {

        public static function getBlogCategoryList()
        {
            $db = Db::getConnection();

            $BlogCategoryList = [];

            $result = $db->query('SELECT id, title FROM blog_category ORDER BY sort_order ASC');

            $i = 0;
            while ($row = $result->fetch()) {
                $BlogCategoryList[$i]['id'] = $row['id'];
                $BlogCategoryList[$i]['title'] = $row['title'];
                $i++;
            }

            return $BlogCategoryList;
        }
    }