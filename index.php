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
        $post_data = filter_input_array(INPUT_POST);
        var_dump($post_data);
        require_once('class.test.php');
        $output = new sanitizeDataForCalculations($post_data);
        // $output->convertValuesIntoArray($post_data); - Required if I weren't using the __construct method in the class.
        var_dump($output->data_array);
        ?>
        <p>Input your data separated by commas in order to calculate the mean and standard deviation.</p>
        <form id="data" method="post" action="">
            <input type="text" name="dataArray">
                <input type="submit">
        </form>
    </body>
</html>
