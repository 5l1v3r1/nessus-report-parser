<?php
/**
 * nessus-report-parser -- DatabaseModel.php
 * User: Simon Beattie
 * Date: 11/06/2014
 * Time: 16:50
 */

namespace Library;


class DatabaseModel extends ReportAbstract{

    public function checkUser($username, $password)
    {
        $pass = 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86';
        $user = 'randomstorm';
        $ID = '10000';

        if ($username == $user && $password == $pass)
        {
            $userID = $ID;
        }
        else
        {
            $userID = NULL;
        }
        return $userID;
    }
}