<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $post_data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        require_once('class.test.php');
        $output = new sanitizeDataForCalculations($post_data);
        $output->convertValuesIntoArray();
        
        $result = new calculateMeanClass($output->data_array);
        if($result !== null) {
          echo $result->mean;
        }
        ?>
        <p>Input your data separated by commas in order to calculate the mean and standard deviation.</p>
        <form id="data" method="post" action="">
            <input type="text" name="dataArray">
                <input type="submit">
        </form>
    </body>
</html>
