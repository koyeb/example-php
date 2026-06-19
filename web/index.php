<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        //Ok we got a POST, probably from a FORM, read from $_POST.
        var_dump($_PSOT); //Use this to see what info we got!
    }
    else
    {
       //You could assume you got a GET
       var_dump($_GET); //Use this to see what info we got!
    }
 ?>
 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta char-set="utf-8">
     <title>Page title</title>
   </head>
   <body>
     <form action="" method="POST">
       <input type="text" value="default value, you can edit it" name="myfield">
       <input type="submit" value = "post">
     </form>
   </body>
 </html>
