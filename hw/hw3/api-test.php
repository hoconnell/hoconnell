<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <?php 
        
            // help from: https://stackoverflow.com/questions/12542469/how-to-read-xml-file-from-url-using-php
            
            $nameOrigins = array();
            
            $name = "Heather";
            // $url = "https://www.behindthename.com/api/lookup.php?name=$name&key=he971690";
            // $info = $_GET[""];
            
            
            $url = "https://www.behindthename.com/api/lookup.php?name=$name&key=he971690";
            $xml = simplexml_load_file($url);
            print_r($xml);
            
            echo "<br/><br/>";
            
            $nameDetail = $xml->name_detail;
            $error = $xml->error;
            
            // echo $error;
            
            if($error == "name could not be found") {
                echo "Sorry, your $error.";
            } else {
                echo "no error";
            }
            
            /*
            *   response
            *       name_detail
            *           usages
            *               usage
            *                   usage_full
            *
            */
            
            // foreach($xml as $i) {
            //     $nameDetail = $xml->name_detail;
            //     print_r($nameDetail);
            //     echo "<br/>";
            // }
            
            // echo count($nameDetail) . "<br/><br/>";
            
            foreach($nameDetail as $n) {
                $usages = $n->usages;
                
                // echo count($usages) . "<br/>";
                // print_r($usages);
                // echo "<br/><br/>";
                
                foreach($usages as $u) {
                    $usage = $u->usage;
                    // echo count($usage) . "<br/>";
                    // print_r($usage);
                    // echo "<br/><br/>";
                    
                    foreach($usage as $uu) {
                        $usageFull = $uu->usage_full;
                        
                        foreach($usageFull as $f) {
                            $origin = $usageFull[0] . " ";
                            
                            if(in_array($origin, $nameOrigins, true)) {
                                
                            } else {
                                array_push($nameOrigins, $origin);
                            }
                        }
                    }
                }
            }
            
            foreach($nameOrigins as $n) {
                echo $n;
            }
            
            // print_r($nameOrigins);
            
            // foreach($xml as $n) {
            //     $nameDetail = $xml->name_detail;
                
            //     foreach($nameDetail as $detail) {
            //         $usages = $detail->usages;
            //         $usage = $usages->usage;
            //         $usageFull = $usage->usage_full;
            //         echo $usageFull[0] . ", ";
            //     }
            // }
            
            // foreach($nameDetail as $detail) {
            //     $usages = $detail->usages;
            //     $usage = $usages->usage;
            //     $usageFull = $usage->usage_full;
            //     echo $usageFull[0] . ", ";
            // }
            
            // $nameDetail = $xml->name_detail;
            // $usages = $nameDetail->usages;
            // $usage = $usages->usage;
            // $usageFull = $usage->usage_full;
            
            // // print_r($usageFull);
            // echo $usageFull[0];
            
        ?>

    </body>
</html>