<?php

/**
 * Created by PhpStorm.
 * User: Peace Ngara
 * Date: 25/06/2017
 * Time: 00:12
 */

include BIN_PATH . "AbstractFactory.php";
include READERS_PATH . "CSVOutput.php";

class CSVFactory extends \peacengara\loanaggregate\classes\bin\AbstractFactory
{
    /**
     * @param array $content
     * @return \peacengara\loanaggregate\classes\readers\CSVOutput
     */
    public function createText(array $content)
    {
        // TODO: Implement createText() method.
        return new \peacengara\loanaggregate\classes\readers\CSVOutput($content);
    }

}