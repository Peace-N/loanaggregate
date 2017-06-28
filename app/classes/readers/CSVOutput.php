<?php
/**
 * Created by PhpStorm.
 * User: GOD IS GREAT
 * Date: 25/06/2017
 * Time: 02:34
 */

namespace peacengara\loanaggregate\classes\readers;

include BIN_PATH . "Text.php";
include READERS_PATH . "Collection.php";


class CSVOutput extends \Text

{
    /**
     * CSVOutput constructor.
     * @param $data
     */
    public function __construct($data)
    {
        parent::__construct($this->readCSVStr($data));
    }

    //Create a CSV Parser
    public function readCSVStr($data)
    {

        // check there are no errors

        if ($data['error'] == 0) {
            $name = $data['name'];
            $type = $data['type'];
            $tmpName = $data['tmp_name'];

            if (file_exists($tmpName)) {
                if (($handle = fopen($tmpName, 'r')) !== false) {
                    set_time_limit(0);
                    ### Get Network Totals
                    $math = new Collection();
                    $network1_res = $math->perfomTotals($handle, 'Network 1');
                    $net1_count  = $network1_res[0];
                    $net1_totals = $network1_res[1];
                    // output headers so that the file is downloaded rather than displayed
                    header('Content-Type: text/csv; charset=utf-8');
                    header('Content-Disposition: attachment; filename=Output.csv');

                    $this->outputCSV(array(
                        array('Network', 'Network Total Loans', 'Network Total Amount'),
                        array('Network 1',$net1_count, $net1_totals)
                    ));

                }
            }

        }

    }

    /**
     * @param $data
     */
    public function outputCSV($data) {
        $output = fopen("php://output", "w");
        foreach ($data as $row)
            fputcsv($output, $row);
        fclose($output);
    }
}