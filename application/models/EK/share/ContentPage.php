<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Moris
 * Date: 23.12.11
 * Time: 21:36
 * To change this template use File | Settings | File Templates.
 */

/*
 *
  CREATE TABLE IF NOT EXISTS `content_page` (
   `id` int(11) NOT NULL,
   `page_title` varchar(40) NOT NULL DEFAULT 'английское название для системы',
   `title` varchar(255) NOT NULL,
   `content` text,
   PRIMARY KEY (`id`),
   UNIQUE KEY `page_title_UNIQUE` (`page_title`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 */

class EK_Share_ContentPage
{
    /**
     * @var string
     */
    protected $_pageTitle;

    /**
     * @var string
     */
    protected $_title;

    /**
     * @var string
     */
    protected $_content;

    /**
     * @var StdLib_DB
     */
    protected $_db = null;

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->_content = $this->_db->prepareString($content);
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return str_replace('&quot;', '"', $this->_db->prepareStringToOut($this->_content));
    }

    /**
     * @param string $pageTitle
     */
    public function setPageTitle($pageTitle)
    {
        $this->_pageTitle = $pageTitle;
    }

    /**
     * @return string
     */
    public function getPageTitle()
    {
        return $this->_pageTitle;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->_title = $this->_db->prepareString($title);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_db->prepareStringToOut($this->_title);
    }

    public function __get($name)
    {
        $method = "get{$name}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

    public function  __construct()
    {
        $this->_db = StdLib_DB::getInstance();
    }

    public function insertToDB()
    {
        try {
            $sql = 'INSERT INTO content_page(page_title, title, content)
                            VALUES("' . $this->_pageTitle . '", "' . $this->_title . '", "' . $this->_content . '")';
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function updateTODB()
    {
        try {
            $sql = 'UPDATE content_page
                       SET title="' . $this->_title . '", content="' . $this->_content . '"
                    WHERE page_title="' . $this->_pageTitle . '"';
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function deleteFromDB()
    {
        try {
            $sql = 'DELETE FROM content_page WHERE page_title="' . $this->_pageTitle . '"';
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }


    public static function getAllInstance()
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM content_page';
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
                $retArray = array();
                foreach ($result as $res) {
                    $retArray[] = EK_Share_ContentPage::getInstanceByArray($res);
                }
                return $retArray;
            } else return false;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getInstanceByArray($values)
    {
        try {
            $o = new EK_Share_ContentPage();
            $o->fillFromArray($values);
            return $o;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getInstanceByTitle($title)
    {
        try {
            $db = StdLib_DB::getInstance();
            $sql = 'SELECT * FROM content_page WHERE page_title="' . $title . '"';
            ;
            $result = $db->query($sql, StdLib_DB::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
                $o = new EK_Share_ContentPage();
                $o->fillFromArray($result[0]);
                return $o;
            } else return false;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     *
     *
     * @param array $values
     * @return void
     * @access public
     */
    public function fillFromArray($values)
    {
        $this->setPageTitle($values['page_title']);
        $this->setTitle($values['title']);
        $this->setContent($values['content']);

    }


}
