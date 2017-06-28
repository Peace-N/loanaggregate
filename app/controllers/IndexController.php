<?php

/**
 * Created by PhpStorm.
 * User: Peace Ngara
 * Date: 25/06/2017
 * Time: 12:04
 */
//namespace peacengara\loanaggregate\classes\bin;

//use peacengara\loanaggregate\classes\bin\CSVFactory as CSV;

class IndexController extends Controller
{

    public function indexAction() {
        include CURR_VIEW_PATH . "index.html";
    }

    /**
     * @return bool
     */
    public function processAction() {
        include BIN_PATH . "CSVFactory.php";
        $data = $_FILES['csv'];
        if(empty($data))
            return false;
        $initCsv = new CSVFactory();
        $initCsv->createText($data);
    }
}
