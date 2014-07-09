<?php
/**
 * Created by PhpStorm.
 * User: s.amaziro
 * Date: 26/03/14
 * Time: 13:48
 */

namespace translator;

use model\databaseutil;
include_once "translation.php";

class mymodel {

    private $mysqli;
    private $errorMsg;

    public function __construct()
    {
        $this->errorMsg = array();
        $this->mysqli = databaseutil::doConnection();
    }


    public function insertTranslation($translation)
    {
        $sql = "INSERT INTO translations (mainKey, translation) values (?, ?)";
        $this->mysqli->set_charset("utf8");
        if( $stmt = $this->mysqli->prepare($sql))
        {
            if( $stmt->bind_param("ss", $translation->getMainKey(), $translation->getTranslation()))
            {
                if($stmt->execute())
                {
                    $stmt->close();
                    return true;
                }
                else
                {
                    $this->addErrorMsg("Error! Failed to Execute Statement");
                }

            }
            else
            {
                $this->addErrorMsg("Error! Failed to Bind Parameters");
            }
        }
        else
        {
            $this->addErrorMsg("Error! Failed to Prepare Statement");
        }
        return false;
    }

    public function fetchAllTranslations()
    {
        $sql = "SELECT * FROM translations";
        $this->mysqli->set_charset("utf8");
        if( $stmt = $this->mysqli->prepare($sql))
        {
            if($stmt->execute())
            {
                $list = array();
                $id = 0;
                $mainKey = $translation = null;
                $stmt->bind_result($id, $mainKey, $translation);
                while($stmt->fetch())
                {
                    $obj = new translation();
                    $obj->setId($id);
                    $obj->setMainKey($mainKey);
                    $obj->setTranslation($translation);
                    array_push($list, $obj);
                }
                $stmt->close();
                return $list;
            }
            else
            {
                $this->addErrorMsg("Error! Failed to Execute Statement");
            }


        }
        else
        {
            $this->addErrorMsg("Error! Failed to Prepare Statement");
        }
        return false;
    }



    public function fetchTranslations($id)
    {
        $sql = "SELECT * FROM translations WHERE id = ?";
        $this->mysqli->set_charset("utf8");
        if( $stmt = $this->mysqli->prepare($sql))
        {
            if( $stmt->bind_param("i", $id))
            {
                if($stmt->execute())
                {
                    $id = 0;
                    $mainKey = $translation = null;
                    $stmt->bind_result($id, $mainKey, $translation);
                    $stmt->fetch();
                    $obj = new translation();
                    $obj->setId($id);
                    $obj->setMainKey($mainKey);
                    $obj->setTranslation($translation);

                    $stmt->close();
                    return $obj;
                }
                else
                {
                    $this->addErrorMsg("Error! Failed to Execute Statement");
                }

             }
            else
                {
                    $this->addErrorMsg("Error! Failed to Bind Parameters");
                }

        }
        else
        {
            $this->addErrorMsg("Error! Failed to Prepare Statement");
        }
        return false;
    }




    /**
     * @param mixed $errorMsg
     */
    public function addErrorMsg($errorMsg)
    {
        array_push($this->errorMsg, $errorMsg);
    }

    /**
     * @return mixed
     */
    public function getErrorMsg()
    {
        return $this->errorMsg;
    }


}