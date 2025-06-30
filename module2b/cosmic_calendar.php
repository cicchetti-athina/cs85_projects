<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cosmic Calendar</title>
    <!-- All styling for the final output page is included below -->
    <style>
        body { font-family: sans-serif; background-color: #1a202c; color: #e2e8f0; }
        .container { max-width: 800px; margin: 2rem auto; padding: 2rem; background-color: #2d3748; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
        h1 { text-align: center; color: #9f7aea; }
        .calendar-grid { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; }
        .day-box { width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 5px; background-color: #4a5568; font-size: 1.2rem; }
        .cosmic-name { background-color: #9f7aea; color: #fff; transform: scale(1.1); box-shadow: 0 0 15px #9f7aea; }
        .cosmic-month { border: 2px solid #f6e05e; }
        .cosmic-both { background-color: #ed8936; color: #fff; border: 2px solid #f6e05e; transform: scale(1.1); box-shadow: 0 0 15px #ed8936; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cosmic Calendar</h1>
        <div class="calendar-grid">
            <?php
                $myName = "A"; 

                // getting the API data 
                $jsonString = file_get_contents('https://timeapi.io/api/time/current/zone?timeZone=America%2FLos_Angeles');
                
                //convert the JSON to a PHP object
                $data = json_decode($jsonString);
                
                //Extract dateTime from the API object
                $dateTimeString = $data->dateTime;
                $date = new DateTime($dateTimeString);
                $dayOfYear = (int)$date->format('z') + 1;
                $month = $data->month;

                $nameLength = strlen($myName);

                //looping from name length to day of the year
                for ($i = $nameLength; $i <= $dayOfYear; $i++) {
                    $cssClass = "day-box";
                    //both
                    if ($i % $nameLength == 0 && $i % $month == 0) {
                           $cssClass .= " cosmic-both";
                    //nameLength
                    } else if ($i % $nameLength == 0) {
                           $cssClass .= " cosmic-name";

                    //month
                    } else if ($i % $month == 0) {
                           $cssClass .= " cosmic-month";
                    }
                    //print
                     echo "<div class='$cssClass'>$i</div>";
                }
            
                /*
                    MY DEBUGGING LOG:
                    I was really confused at first especially about how to extract the data from the API object but the sample code really helped a lot. 
                    The part that tripped me up after that  was setting the loop to start at my name length, but it was simple to just set $i to nameLength.
                    I tested a few different names and it was working like it was supposed to.
                */
            ?>
        </div>
    </div>
</body>
</html>