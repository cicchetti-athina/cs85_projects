<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>T-Shirt Price Engine</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f6f8; color: #333; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .receipt { background-color: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 400px; border-top: 5px solid #005a9c; }
        h1 { text-align: center; color: #005a9c; }
        ul { list-style: none; padding: 0; }
        li { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #eee; }
        .total { font-size: 1.5em; color: #28a745; }
    </style>
</head>
<body>
    <div class="receipt">
        <h1>Order Summary</h1>
        <?php
            // --- Configuration: Change these values to test all business rules! ---
            $size = 'S'; // Options: 'S', 'M', 'L', 'XL'
            $color = 'Ocean Blue'; // Any string, but test with 'Sunset Orange' or 'Ocean Blue'
            $isCustomized = false; // Options: true, false
            $customerFirstName = 'Athinaddd'; // <-- IMPORTANT: REPLACE WITH YOUR ACTUAL FIRST NAME

            // --- Part A: Implement the logic below using ONLY simple, nested if-statements ---
            $finalPrice = 22.50;
            $details = "<li>Base Price: <span>$" . number_format($finalPrice, 2) . "</span></li>";

            // Your nested if-statement logic goes here...
            // size L
            if ($size == 'L') {
                 $finalPrice = $finalPrice + 1.75;
                 $details .= "<li>Size (L) Upcharge: <span>+$1.75</span></li>";
                 
                 //sunset orange or ocean blue
                 if($color == 'Sunset Orange' || $color == 'Ocean Blue'){
                    $finalPrice = $finalPrice + 2.00;
                    $details .= "<li>Color Upcharge: <span>+$2.00</span></li>";
                    //shirt could be sunset orange with custom text
                    if($isCustomized == true){
                        $finalPrice = $finalPrice + 5.00;
                        $details .= "<li>Customization  Upcharge: <span>+$5.00</span></li>";

                        //long name discount
                        if (strlen($customerFirstName) > 6) {
                           $finalPrice = $finalPrice - 1.00;
                           $details .= "<li>Long Name Discount: <span>-$1.00</span></li>";
                          }
                        }
                 }
                 
                
                 
                 //shirt customization other colors
                 else if($isCustomized == true){
                      $finalPrice = $finalPrice + 5.00;
                      $details .= "<li>Customization Upcharge: <span>+$5.00</span></li>";
                      
                      //long name discount
                      if (strlen($customerFirstName) > 6) {
                         $finalPrice = $finalPrice - 1.00;
                         $details .= "<li>Long Name Discount: <span>-$1.00</span></li>";
                        }
                      }
                    }
                
                 
             
             
             //size XL
             else if($size == 'XL'){
                  $finalPrice = $finalPrice + 2.50;
                  $details .= "<li>Size (XL) Upcharge: <span>+$2.50</span></li>";
                  
                 //sunset orange
                 if($color == 'Sunset Orange' || $color == 'Ocean Blue'){
                     $finalPrice = $finalPrice + 2.00;
                     $details .= "<li>Color Upcharge: <span>+$2.00</span></li>";
                     
                    //shirt could be sunset orange with custom text
                    if($isCustomized == true){
                        $finalPrice = $finalPrice + 5.00;
                        $details .= "<li>Customization (XL) Upcharge: <span>+$5.00</span></li>";
                        $finalPrice = $finalPrice + 3.00;
                        $details .= "<li>XL Handling Fee: <span>+$3.00</span></li>";
                        //long name discount
                        if (strlen($customerFirstName) > 6) {
                           $finalPrice = $finalPrice - 1.00;
                           $details .= "<li>Long Name Discount: <span>-$1.00</span></li>";
                          }
                        }
                 }
                
                 
                 //shirt customization other colors
                 else if($isCustomized == true){
                      $finalPrice = $finalPrice + 5.00;
                      $details .= "<li>Customization (XL) Upcharge: <span>+$5.00</span></li>";
                      $finalPrice = $finalPrice + 3.00;
                      $details .= "<li>XL Handling Fee: <span>+$3.00</span></li>";
                      //long name discount
                      if (strlen($customerFirstName) > 6) {
                         $finalPrice = $finalPrice - 1.00;
                         $details .= "<li>Long Name Discount: <span>-$1.00</span></li>";
                        }
                      }
                    }
                
              

              //all other sizes
              else {
                 if($color == 'Sunset Orange' || $color == 'Ocean Blue'){
                    $finalPrice = $finalPrice + 2.00;
                    $details .= "<li>Color Upcharge: <span>+$2.00</span></li>";
                    
                   //shirt could be sunset orange with custom text
                   if($isCustomized == true){
                       $finalPrice = $finalPrice + 5.00;
                       $details .= "<li>Customization Upcharge: <span>+$5.00</span></li>";
                       
                       //long name discount
                       if (strlen($customerFirstName) > 6) {
                          $finalPrice = $finalPrice - 1.00;
                          $details .= "<li>Long Name Discount: <span>-$1.00</span></li>";
                         }
                       }
                }
                
                
                //shirt customization other colors
                else if($isCustomized == true){
                     $finalPrice = $finalPrice + 5.00;
                     $details .= "<li>Customization Upcharge: <span>+$5.00</span></li>";
                     
                     //long name discount
                     if (strlen($customerFirstName) > 6) {
                        $finalPrice = $finalPrice - 1.00;
                        $details .= "<li>Long Name Discount: <span>-$1.00</span></li>";
                       }
                     }
                   }
               

                
            /*
                MY DEBUGGING LOG:
                The first problem I ran into was figuring out how to get the customized option to trigger only one time if the shirt color was Ocean Blue or Sunset Orange, it would charge twice.
                So what I did originally was after the options for the color upcharges, I did a nested if loop to check if the colors ARE NOT premium colors, and if they are not to check if they
                have a customization option. So that fixed the issue with charging premium colors for customization twice. I also at first totally forgot to check for other sizes outside of L and XL
                so when I tested it at first it seemed fine with the original XL input but when I changed it to S I realized my mistake. So I had to do a similar thing, nested if conditions to check
                if the sizes are NOT XL and NOT L. That fixed that issue. Once I could use else if and else as well as or and and everything actually seemed a lot less complicated. However, I still 
                feel like maybe I missed something that could be simplified by else if etc. 

            */

            // --- DO NOT EDIT BELOW THIS LINE ---
            echo "<ul>" . $details . "</ul>";
            echo "<ul><li><span class='total'>Final Price:</span> <span class='total'>$" . number_format($finalPrice, 2) . "</span></li></ul>";

        ?>
    </div>
</body>
</html>