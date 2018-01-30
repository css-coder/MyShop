<?php

    class Blog
    {
        const SHOW_POST_DEFAULT = 5;

        public static function getLatestBlogPosts($count = self::SHOW_POST_DEFAULT)
        {
            $db = Db::getConnection();

            $latestPostsList = [];

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

        public static function getBlogPostsListCategoryById($blogCategoryId = false, $count = self::SHOW_POST_DEFAULT, $page = 1)
        {
            if ($blogCategoryId) {

                $count = intval($count);
                $page = intval($page);
                $offset = ($page - 1) * $count;

                $db = Db::getConnection();

                $posts = [];

                $result = $db->query("SELECT id, title, short_description FROM blog WHERE status='1' AND blog_category_id='$blogCategoryId' ORDER BY id ASC LIMIT " . $count . " OFFSET " . $offset);

                $i = 0;
                while ($row = $result->fetch()) {
                    $posts[$i]['id'] = $row['id'];
                    $posts[$i]['title'] = $row['title'];
                    $posts[$i]['short_description'] = $row['short_description'];
                    $i++;
                }

                return $posts;
            }
        }

        public static function getPostById($id)
        {
            $id = intval($id);

            if ($id) {

                $db = Db::getConnection();

                $result = $db->query('SELECT * FROM blog WHERE id=' . $id);
                $result->setFetchMode(PDO::FETCH_ASSOC);

                return $result->fetch();
            }


        }

        public static function getTotalPostsInCategory($blogCategoryId)
        {
	        $db = Db::getConnection();

	        $result = $db->query('SELECT count(id) AS count FROM blog WHERE status="1" AND blog_category_id ="' . $blogCategoryId . '"');
	        $result->setFetchMode(PDO::FETCH_ASSOC);
	        $row = $result->fetch();

	        return $row['count'];
        }
    }