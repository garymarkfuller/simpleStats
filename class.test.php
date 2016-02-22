<?php
/**
 * A class to Sanitize a set of values supplied by the user, turn it into an array of numbers then count the number of items in the array
 * @param $data_array
 * @author Gary
 */
class sanitizeDataForCalculations 
{
    public $data_array;  //Class Variable - use $this->data_array to call or set  
    private $post_data;
    public function __construct($post_data){
      $this->post_data = $post_data;
    }
    public function convertValuesIntoArray() {             
        $this->data_array = explode(", ", $this->post_data["dataArray"]);              
        return $this->data_array;
    }
} 
    
/**
 * A class to calculate Mean using a set of values supplied by the user - mean = sum of all values / number of values
 * @param $n, $data_array
 * @author Gary
 */
class calculateMeanClass 
{
    public $n;
    public $sum;
    public $mean;
    public function __construct($data_array) {
      $this->sumOfDataArray($data_array);
      $this->countTheValues($data_array);
      $this->divisionOfSumOfDataArray($this->sum, $this->n);
    }
    public function sumOfDataArray($data_array) {
        $this->sum = array_sum($data_array);
        return $this->sum;
    }
    public function countTheValues($data_array){
        $this->n = count($data_array);  
        return $this->n;
    }
    public function divisionOfSumOfDataArray($sum, $n) {
        $this->mean = $sum / $n;
        return $this->mean;
    }       
}

class calculateTheMeanClass 
{
  
}
/**
 * A class to calculate Standard Deviation using a set of values supplied by the user
 * @param $n, $data_array, $mean
 * @author Gary
 */
class calculateStandardDeviationClass extends calculateMeanClass {
    
}
