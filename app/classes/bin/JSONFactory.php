<?php
/**
 * Created by PhpStorm.
 * User: Peace Ngara <peacengara@aol.com>
 * Date: 25/06/2017
 * Time: 00:28
 */

namespace peacengara\loanaggregate\classes\bin;
use peacengara\loanaggregate\classes\readers\JSONOutput;


class JSONFactory extends AbstractFactory
{
    public function createText(string $content): Text
    {
        // TODO: Implement createText() method.
        return new JSONOutput($content);
    }

}