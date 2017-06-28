<?php
/**
 * Created by PhpStorm.
 * User: GOD IS GREAT
 * Date: 25/06/2017
 * Time: 16:29
 */

namespace peacengara\loanaggregate\classes\readers;


class Collection
{
    //Turple SumCount Algorithim by Peace Ngara
    /**
     * @param $handle
     * @param $turple
     * @return array
     *
     */

    public function perfomTotals($handle, $turple)
    {
        $networkN = array($turple);
        //Escape Special Characters
        $networkN = array_map('preg_quote', $networkN);
        // Case Insensitive Argument
        $regex = '/' . implode($networkN) . '/i';
        //Set Counter
        $i = 0;
        $total_amount = 0;
        while (($line = fgetcsv($handle)) !== false) {
            //MSISDN,Network,Date,Product,Amount
            list($msisdn, $network, $date, $product, $amount) = $line;
            if (preg_match($regex, $network)) {
                $i++;
                $total_amount += $amount;
            }
        }

        return [$i, $total_amount];
    }
}