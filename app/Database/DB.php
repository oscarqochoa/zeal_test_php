<?php

namespace App\Database;

use mysqli;

class DB
{

    public static function select($sentence)
    {
        $response = [];

        $conn = mysqli_connect("127.0.0.1", "root", "", "zael");
        $result = mysqli_query($conn, $sentence);

        while ($obj = $result->fetch_object()) {
            array_push($response, $obj);
        }

        return $response;
    }
}
