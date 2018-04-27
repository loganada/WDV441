<?php
require_once('Base.class.php');

class cmsData extends Base {

    function __construct()
    {
        // still run parent functionality
        parent::__construct();

        $this->tableName = "cms_data";
        $this->keyField = "url_key";
        $this->id = "cms_data_id";
        $this->columnNames = array
        (
           "page_title",
           "keywords",
           "header",
           "content",
           "url_key"
        );
    }

    function santinize($dataArray)
    {
        // sanitize data based on rules

        return $dataArray;
    }

    function validate()
    {
        $isValid = true;

        // if an error, store to errors using column name as key
        if (empty($this->data['page_title']))
        {
            $this->errors['page_title'] = "Please enter a title <br>";
            $isValid = false;
        }
        if (empty($this->data['keywords']))
        {
            $this->errors['keywords'] = "Please enter keywords <br>";
            $isValid = false;
          }
            if (empty($this->data['header']))
            {
                $this->errors['header'] = "Please enter a header <br>";
                $isValid = false;
            }
            if (empty($this->data['content']))
            {
                $this->errors['content'] = "Please enter Content<br>";
                $isValid = false;
            }
            if (empty($this->data['url_key']))
            {
                $this->errors['url_key'] = "Please enter a Key <br>";
                $isValid = false;
            }
        return $isValid;
    }

    function saveImage($imageFileData)
    {
        move_uploaded_file
        (
            $imageFileData['tmp_name'],
            dirname(__FILE__) . "/../public_html/images/cms_data_" . $this->data[$this->keyField] . ".jpg"
        );
    }
}
?>
