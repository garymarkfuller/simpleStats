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
    require_once('src/class.test.php');
    $output = new sanitizeDataForCalculations($post_data);
    $output->convertValuesIntoArray();

    $meanresult = new calculateMeanClass($output->data_array);
    if ($meanresult->mean !== null) {
      echo "<p>Mean = " . $meanresult->mean . "</p>";
    }
    $medianresult = new calculateMedianClass($output->data_array);
    if ($medianresult->median !== null) {
      echo "<p>Median = " . $medianresult->median . "</p>";
    }
    $sdresult = new calculateStandardDeviationClass($output->data_array);
    if ($sdresult->standard_deviation !== null) {
      echo "<p>Standard Deviation = " . $sdresult->standard_deviation . "</p>";
    }
    ?>
    <p>Input your data separated by commas in order to calculate the mean and standard deviation.</p>
    <form id="data" method="post" action="">
      <input type="text" name="dataArray">
      <input type="submit">
    </form>
  </body>
</html>
