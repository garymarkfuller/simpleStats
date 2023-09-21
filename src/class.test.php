<?php

/**
 * A class to Sanitize a set of values supplied by the user, turn it into an array of numbers then count the number of items in the array
 * @param $data_array, $n
 * @author Gary
 */
class sanitizeDataForCalculations 
{

    public $data_array;  //Class Variable - use $this->data_array to call or set
    public $n;
    private $post_data;

    public function __construct($post_data) 
    {
        $this->post_data = $post_data;
    }

    public function convertValuesIntoArray() 
    {
        $this->data_array = explode(",", str_replace(" ", "", $this->post_data["dataArray"]));
        return $this->data_array;
    }
    public function countTheValues()
    {
        $this->n = count($this->data_array);
        return $this->n;
    }

}

/**
 * A class to calculate Mean using a set of values supplied by the user - mean = sum of all values / number of values
 * @param $n, $data_array, $sum, $mean
 * @author Gary
 */
class calculateMeanClass 
{

    public $sum;
    public $mean;

    public function __construct($data_array, $n)
    {
        $this->sumOfDataArray($data_array);
        $this->divisionOfSumOfDataArray($this->sum, $n);

    }

    public function sumOfDataArray($data_array) 
    {
        $this->sum = array_sum($data_array);
        return $this->sum;
    }

    public function divisionOfSumOfDataArray($sum, $n) 
    {
        $this->mean = $sum / $n;
        return $this->mean;
    }

}

/**
 *A class to calculate Median using a set of values supplied by the user
 * @param $n, $data_array, $median_index_value, $median_value_one, $median_value_two, $ordered_data_array, $median
 * @author Gary 
 */
class calculateMedianClass 
{
    public $median_index_value;
    public $median_value_one;
    public $median_value_two;
    public $median;

    public function __construct($data_array, $n)
    {
        $this->orderTheValues($data_array);
        $this->identifyMedianIndexValue($n);
        $this->medianResult($data_array, $this->median_index_value, $n);
    }

    public function orderTheValues(&$data_array)
    {
        sort($data_array);
        return $data_array;
    }

    public function identifyMedianIndexValue($n)
    {
        if ($n % 2 !== 0) {
            // Median is normally rounded up, but we have to factor in the fact that arrays are indexed from 0
            $this->median_index_value = round($n/2,0, PHP_ROUND_HALF_DOWN);
            return $this->median_index_value;
        } else {
            $this->median_value_one = $n/2;
            // Median is normally +1, but we have to factor in the fact that arrays are indexed from 0
            $this->median_value_two = $n/2 - 1;
            $this->median_index_value = array($this->median_value_one, $this->median_value_two);
            return $this->median_index_value;
        }

    }

    public function medianResult ($data_array, $median_index_value, $n)
    {
        if ($n % 2 !== 0 && !is_array($median_index_value)) {
            $this->median = $data_array[$median_index_value];
        } else {
            $this->median = ($data_array[$median_index_value[0]] + $data_array[$median_index_value[1]])/2;
        }
        return $this->median;
    }
}

/**
 * A class to calculate Standard Deviation using a set of values supplied by the user
 * @param $data_array, $sumofxsquared, $sumofsquaredx, $standard_deviation
 * @author Gary
 * Interesting version of this as a function on https://chat.openai.com/share/f71c5744-d96b-4d4e-9a83-0ae53868a3d2
 */
class calculateStandardDeviationClass 
{

    public $data_array;
    public $sumofxsquared;
    public $sumofsquaredx;
    public $standard_deviation;

    public function __construct($data_array) 
    {
        $this->data_array = $data_array;
        $this->sumOfSquaredX();
        $this->sumOfXSquared();
        $this->standardDeviationResult();
    }

    public function sumOfXSquared() 
    {
        $this->sumofxsquared = (array_sum($this->data_array) * array_sum($this->data_array)) / count($this->data_array);
        return $this->sumofxsquared;
    }

    public function sumOfSquaredX() 
    {
        foreach ($this->data_array as $value) {
            $xsquared_array[] = $value * $value;
        }
        $this->sumofsquaredx = array_sum($xsquared_array);
        return $this->sumofsquaredx;
    }

    public function standardDeviationResult()
    {
        $this->standard_deviation = sqrt(($this->sumofsquaredx - $this->sumofxsquared) / (count($this->data_array) - 1));
        return $this->standard_deviation;
    }

}
