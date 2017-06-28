<?php

/**
 * Created by PhpStorm.
 * User: Peace Ngara <peacengara@aol.com>
 * Date: 24/06/2017
 * Time: 23:44
 * An Abstract Contract for text rendering : Json, CSV, XML
 * An Abstract Factory Design Pattern Implementantion
 */
namespace peacengara\loanaggregate\classes\bin;

abstract class AbstractFactory
{
    abstract public function createText(array $content);

}