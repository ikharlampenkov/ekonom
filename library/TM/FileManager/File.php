<?php

/**
 * class File
 *
 */
class TM_FileManager_File
{
    /** Aggregations: */
    /** Compositions: */
    /*     * * Attributes: ** */

    /**
     *
     * @access protected
     */
    protected $_name;

    /**
     *
     * @access protected
     */
    protected $_path;

    protected $_subPath = '';

    /**
     *
     * @access protected
     */
    protected $_ext;

    /**
     *
     * @access protected
     */
    protected $_tempPath;

    /**
     *
     * @access protected
     */
    protected $_size;

    /**
     *
     *
     * @return string
     * @access public
     */
    public function getName()
    {
        return $this->_name;
    }

    public function setName($value)
    {
        $this->_name = $value;
        $this->_ext = $this->extractExt($value);
    }

    public function getPath()
    {
        return $this->_path;
    }

    public function setSubPath($folder)
    {
        $this->_subPath = $folder;
    }

    public function getSubPath()
    {
        return $this->_subPath;
    }

    /**
     *
     *
     * @param string $path
     * @param string $name
     * @return TM_FileManager_File
     * @access public
     */
    public function __construct($path, $name = '')
    {
        $this->_path = $path;
        $this->_name = $name;

        if (!empty($this->_name)) {
            $this->_ext = $this->extractExt($this->_name);
        }
    }

    /**
     *
     *
     * @param string $field
     * @return string
     * @access public
     */
    public function download($field)
    {

        if (isset($_FILES[$field]) && $_FILES[$field]['error'] == 0) {
            $this->_ext = $this->extractExt($_FILES[$field]['name']);
            $tempFileName = 'file_' . date('d-m-Y-H-i-s') . '.' . $this->_ext;
            $result = copy($_FILES[$field]['tmp_name'], $this->_path . $this->_subPath . '/' . $tempFileName);

            if ($result) {
                chmod($this->_path . $this->_subPath . '/' . $tempFileName, 0766);
                $this->_name = $tempFileName;
                return $this->_name;
            } else {
                throw new Exception('Can not upload file ' . $this->_path . $this->_subPath . '/' . $tempFileName . ' res ' . $result);
            }
        } else {
            return false;
        }
    }

// end of member function download

    /**
     *
     *
     * @return void
     * @access public
     */
    public function delete()
    {
        if (!empty($this->_name) && file_exists($this->_path . $this->_subPath . '/' . $this->_name)) {
            $result = unlink($this->_path . $this->_subPath . '/' . $this->_name);
            if ($result === false) {
                throw new Exception('Can not delete file ' . $this->_name);
            }
        }
    }

    /**
     *
     *
     * @param string $name
     * @return string
     * @access protected
     */
    protected function extractExt($name)
    {
        if (!empty($name)) {
            $tempInfo = pathinfo($name);
            return $tempInfo['extension'];
        } else {
            return '';
        }
    }

    public function getLastFolder()
    {
        $temp = explode('/', $this->_path);
        return $temp[count($temp) - 1];
    }

// end of member function extractExt
}

// end of File
?>