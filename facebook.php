<?php 
//107212472039847

// Generated @ codebeautify.org
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v18.0/107212472039847?fields=posts%7Bfull_picture%2Cmessage%2Ccreated_time%7D&access_token=EAAVzMLauDsMBO4UKblN1bp6MpoZAbZBZCGD3SU09ZCt2cZBugn8LLiiMYixnZBtu7txbPSPj0ICL2pKyzghP2NLZBrpwyBlxHb1opLtbzDkRZABZCfNwpw4ioeEh7tWCwph6yCSocozXTCxWUwypZAGDQlaWU8luHJOWax00vzJda96ldf0mK7SOZBGyKRf5XEokgxdpYeHulJV9gPa6buRC4ZBYqANzIEIA7dZBXIDjNY2y4M14ZD');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

curl_close($ch);

$data=json_decode($result);

foreach($data->posts->data as $item){
    echo '<pre>';
    
    print_r($item->created_time);

    
    echo "</pre>";
}


//echo file_get_contents('https://daraz.com.bd');



// Open the CSV file for reading
$file = fopen("students.csv", "r");

// Check if the file was opened successfully
if ($file) {
    // Read the first row (header) from the CSV file
    $header = fgetcsv($file);

    // Output the header
    echo "<table border='1'><tr>";
    foreach ($header as $col) {
        echo "<th>$col</th>";
    }
    echo "</tr>";

    // Loop through the rest of the file
    while (($data = fgetcsv($file)) !== false) {
        echo "<tr>";
        // $data is an array containing the values of each column in the current row
        foreach ($data as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }

    // Close the file
    fclose($file);

    echo "</table>";
} else {
    // Handle the case when the file could not be opened
    echo "Unable to open file.";
}
?>


