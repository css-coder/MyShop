<?php

    class Blog
    {
        const SHOW_POST_DEFAULT = 5;

        public static function getBlogPostsListByCategory($count = self::SHOW_POST_DEFAULT)
        {
            $db = Db::getConnection();

            $latestPostsList = array();

            $result = $db->query('SELECT id, title, short_description FROM blog WHERE status="1" ORDER BY id DESC LIMIT ' . $count);

            $i = 0;
            while ($row = $result->fetch()) {
                $latestPostsList[$i]['id'] = $row['id'];
                $latestPostsList[$i]['title'] = $row['title'];
                $latestPostsList[$i]['short_description'] = $row['short_description'];
                $i++;
            }

            return $latestPostsList;
        }
    }