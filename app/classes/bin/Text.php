<?php
/**
 * Created by PhpStorm.
 * User: GOD IS GREAT
 * Date: 25/06/2017
 * Time: 01:52
 */

//namespace peacengara\loanaggregate\classes\bin;

abstract class Text
{
    private $text;

    /**
     * Text constructor.
     * @param $text
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

}