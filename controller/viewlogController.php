<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 04/07/14
 * Time: 14:31
 */

namespace controller;


use application\basecontroller;
use logviewer\logviewer;

class viewlogController extends basecontroller{

    public function index()
    {
        $logs = new logviewer();
        $this->registry->template->headTitle = "Samuel's Log Viewer";

        if(isset($_GET['dir']) && isset($_GET['read']))
        {
            $Dir = $_GET['dir'];
            $read = $_GET['read'];
            $logs->setLogDir($Dir);
            $logs->setFileToRead($read);
            $logs->currentSize = $_GET['size'];
            $logs->readFile();
            $this->registry->template->text = $logs->text;
            $this->registry->template->loadview("log");
        }
        else
        {
            $files = array();
            $dates = array();
            try
            {

                if(isset($_POST['cd']))
                {
                    $dir = $_POST['cd'];
                    $logs->setLogDir($dir);
                    $logs->changeDir();
                }
                else
                {
                    $logs->readDir();
                }
                $files = $logs->getFiles();
                $dates = $logs->getFileDates();
            }catch (\Exception $ex)
            {
                echo $ex->getMessage();
            }
            $this->registry->template->logdir = $logs->getLogDir();
            $this->registry->template->headTitle = "Samuel's Log Viewer";
            $this->registry->template->sizes = $logs->getSize();
            $this->registry->template->files = $files;
            $this->registry->template->fileDates = $dates;
            $this->registry->template->loadview("viewlog");
        }
    }

    public function controllerComponents(){
        return array("logviewer");
    }

} 