<?php



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * A class to Sanitize a set of values supplied by the user, turn it into an array of numbers then count the number of items in the array
 * @param $n, $data_array
 * @author Gary
 */
class sanitizeDataForCalculations {

    public $data_array;  //Class Variable - use $this->data_array to call or set  
    public function __construct($post_data){
    $this->convertValuesIntoArray($post_data);
    }
    public function convertValuesIntoArray($post_data) {             
        $this->data_array = explode(", ", $post_data["dataArray"]);              
        return $this->data_array;
        }        
    //public function countTheValues($data_array){
        
    //    return $n;
     //   }
} 
    
/**
 * A class to calculate Mean using a set of values supplied by the user - mean = sum of all values / number of values
 * @param $n, $data_array
 * @author Gary
 */
class calculateMeanClass {
    protected $n;
    protected $data_array;
    public function sumOfDataArray($data_array) {
        
        return $sum;
    }
    public function divisionOfSumOfDataArray($sum, $n) {
        
        return $mean;
    }       
}
/**
 * A class to calculate Standard Deviation using a set of values supplied by the user
 * @param $n, $data_array, $mean
 * @author Gary
 */
class calculateStandardDeviationClass extends calculateMeanClass {
    
}
