<?php

use App\Models\Student_Profile;
use App\Models\Decoy_Table;
use App\Models\Applications_Decoy;



class Chart_Data_Maker{


    // SET THIS CLASS TIME ZONE. VERY IMPORTANT
    private $TIME_ZONE;


    // SET CLASS CONSTRUCTOR HERE
    public function __construct($__TIME_ZONE = "Africa/Lagos"){
        $this->TIME_ZONE = $__TIME_ZONE;
    }

        
    // GET AND PROCESS CHART DATAS FOR BUSINESS DASHBOARD CHART
    public function IFY_CHART_DATA_CONSTRUCTOR_FOR_BUSINESS(){
        // extract user ID from Auth
        $USER_ID = (Auth::user()->id);
        /* here we create the array we shall be using to store the number of transactions per given month */
        $AVAILABLE_JOBS = $JOBS_CREATED = $APPLICATION_RECEIVED = array();
        /* Get the past six months in integer format.  */
        $NUMERIC_LAST_SIX_MONTHS = $this->NUMERIC_PAST_SIX_MONTH_FETCHER($this->TIME_ZONE);
        /* Get the past six months in human readable format.  */
        $LAST_SIX_MONTHS = $this->PAST_SIX_MONTH_FETCHER($this->TIME_ZONE);
        /* get the chart year range. */
        $CHART_YEAR_RANGE = $this->SIX_MONTHS_YEAR_OVERLAP_LIMIT_GETTER($this->TIME_ZONE);
        
        /* We shall be using this loop to run the last six months presentable datas against the database trabnsaction table, in a bid to get the number of transactions per given month
            * in this loops, loop cycle. */
        for ($index = 0; $index < count($NUMERIC_LAST_SIX_MONTHS); $index++){
            // CREATE A DATABASE QUERY OBJECT OF THE JOBS-DECOY TABLE AND EFFECT ALL THE DATE FILTERS RESPECTIVELY
            $JOBS_DECOY_TABLE_DEFAULT_OBJECT = Decoy_Table::where("created_at", "LIKE", "%-".$NUMERIC_LAST_SIX_MONTHS[$index]."-%")
                ->where(function($NEW_WHERE_OBJECT) use ($CHART_YEAR_RANGE) {
                    $NEW_WHERE_OBJECT->where("created_at", "LIKE", "%".$CHART_YEAR_RANGE[0]."-%")
                                    ->orWhere("created_at", "LIKE", "%".$CHART_YEAR_RANGE[1]."-%");
                });
            // DISCLAIMER!!! BECAUSE OF THE WAY WE USING THE "JOBS_DECOY_TABLE_DEFAULT_OBJECT" OBJECT, MAKE SURE THIS LINE OF CODE COMES FIRST. THIS
            // PIECE OF CODE FECTES ALL THE JOBS REGISTERED ON THIS SYSTEM.
            $AVAILABLE_JOBS[] = $JOBS_DECOY_TABLE_DEFAULT_OBJECT->get("decoy_id")->count();
            // USING THE "JOBS_DECOY_TABLE_DEFAULT_OBJECT" OBJECT, AFTER WE MUST HAVE GOTTEN ALL REGISTERED JOBS, WE NOW APPLY AN ADDITIONAL FILTER TO
            // THE "JOBS_DECOY_TABLE_DEFAULT_OBJECT" OBJECT, WHICH IS SAFE TO DO AT THIS POINT OF THE CODE, THIS EXTRA FILTER GETS US THE JOBS POSTED
            // ONLY BY THE CURRENTLY LOGGED-IN BUSINESS ACCOUNT.
            $JOBS_CREATED[] = $JOBS_DECOY_TABLE_DEFAULT_OBJECT->where("owner_id", "=", $USER_ID)->get("decoy_id")->count();
            // FROM THE APPLICATION DECOY TABLE, FETCH OUT ALL APPLICATIONS SENT TO JOBS CREATED BY THE LOGGED-IN BUSINESS
            $APPLICATION_RECEIVED[] = Applications_Decoy::where("business_id", "=", $USER_ID)
                ->where("created_at", "LIKE", "%-".$NUMERIC_LAST_SIX_MONTHS[$index]."-%")
                ->where(function($NEW_WHERE_OBJECT) use ($CHART_YEAR_RANGE) {
                    $NEW_WHERE_OBJECT->where("created_at", "LIKE", "%".$CHART_YEAR_RANGE[0]."-%")
                                    ->orWhere("created_at", "LIKE", "%".$CHART_YEAR_RANGE[1]."-%");
                })->get("appl_decoy_id")->count();
        }
        
        /* return the final CHART DATA Results. */
        return array($LAST_SIX_MONTHS, $JOBS_CREATED, $APPLICATION_RECEIVED, $AVAILABLE_JOBS);
    }








    // GET AND PROCESS CHART DATAS FOR STUDENT DASHBOARD CHART 
    public function IFY_CHART_DATA_CONSTRUCTOR_FOR_STUDENT(){
        // extract user ID from Auth
        $USER_ID = (Auth::user()->id);
        /* here we create the array we shall be using to store the number of transactions per given month */
        $AVAILABLE_JOBS = $FREELANCE_JOBS = $APPLICATION_SENT = array();
        /* Get the past six months in integer format.  */
        $NUMERIC_LAST_SIX_MONTHS = $this->NUMERIC_PAST_SIX_MONTH_FETCHER($this->TIME_ZONE);
        /* Get the past six months in human readable format.  */
        $LAST_SIX_MONTHS = $this->PAST_SIX_MONTH_FETCHER($this->TIME_ZONE);
        /* get the chart year range. */
        $CHART_YEAR_RANGE = $this->SIX_MONTHS_YEAR_OVERLAP_LIMIT_GETTER($this->TIME_ZONE);
        
        /* We shall be using this loop to run the last six months presentable datas against the database trabnsaction table, in a bid to get the number of transactions per given month
            * in this loops, loop cycle. */
        for ($index = 0; $index < count($NUMERIC_LAST_SIX_MONTHS); $index++){
            // HERE WE EXTRACT STRATEGICALLY, ALL THE FREELANCE JOBS LOGGED-IN STUDENT ACCOUNT HAS APPLIED TO.
            $FREELANCE_JOBS[] = Applications_Decoy::join('decoy_table', 'decoy_table.job_id', '=', 'applications_decoy.job_id')
                ->where("applications_decoy.created_at", "LIKE", "%-".$NUMERIC_LAST_SIX_MONTHS[$index]."-%")
                ->where(function($NEW_WHERE_OBJECT) use ($CHART_YEAR_RANGE) {
                    $NEW_WHERE_OBJECT->where("applications_decoy.created_at", "LIKE", "%".$CHART_YEAR_RANGE[0]."-%")
                                    ->orWhere("applications_decoy.created_at", "LIKE", "%".$CHART_YEAR_RANGE[1]."-%");
                })->whereIn("job_type", ['Freelancer', 'Temporary'])->get("decoy_id")->count();
            // THIS PIECE OF CODE FECTES ALL THE JOBS REGISTERED ON THIS SYSTEM.
            $AVAILABLE_JOBS[] = Decoy_Table::where("created_at", "LIKE", "%-".$NUMERIC_LAST_SIX_MONTHS[$index]."-%")
                ->where(function($NEW_WHERE_OBJECT) use ($CHART_YEAR_RANGE) {
                    $NEW_WHERE_OBJECT->where("created_at", "LIKE", "%".$CHART_YEAR_RANGE[0]."-%")
                                    ->orWhere("created_at", "LIKE", "%".$CHART_YEAR_RANGE[1]."-%");
                })->get("decoy_id")->count();
            // FROM THE APPLICATION DECOY TABLE, FETCH OUT ALL APPLICATIONS SENT TO JBUSINESSES BY THE CURRENT LOGGED-IN MEMBER
            $APPLICATION_SENT[] = Applications_Decoy::where("owner_id", "=", $USER_ID)
                ->where("created_at", "LIKE", "%-".$NUMERIC_LAST_SIX_MONTHS[$index]."-%")
                ->where(function($NEW_WHERE_OBJECT) use ($CHART_YEAR_RANGE) {
                    $NEW_WHERE_OBJECT->where("created_at", "LIKE", "%".$CHART_YEAR_RANGE[0]."-%")
                                    ->orWhere("created_at", "LIKE", "%".$CHART_YEAR_RANGE[1]."-%");
                })->get("appl_decoy_id")->count();
        }
        
        /* return the final CHART DATA Results. */
        return array($LAST_SIX_MONTHS, $AVAILABLE_JOBS, $FREELANCE_JOBS, $APPLICATION_SENT);
    }







    /* FUNCTION TO ENSURE THE ACCURACY OF THE CHART. */
    public function SIX_MONTHS_YEAR_OVERLAP_LIMIT_GETTER($TIME_ZONE){
        /* get timezone. */
        date_default_timezone_set($TIME_ZONE);
        /* get the current month integer data in accordance with the supplied timezone. */
        $MONTH_INTEGER = date("m");
        $current_year = date("Y");
        /*   */
        IF(($MONTH_INTEGER == "01") || ($MONTH_INTEGER == "02") || ($MONTH_INTEGER == "03") || ($MONTH_INTEGER == "04") || ($MONTH_INTEGER == "05")){
            RETURN array(($current_year - 1), $current_year);
        }ELSE{
            RETURN array($current_year, $current_year);
        }
    }






    /* A FUNCTION TO HELP US GET IN HUMAN READABLE FORMAT, THE PAST SIX MONTHS IN ASCENDING ORDER AND INSIDE AN ARRAY. THE COUNTING OF THE PAST SIX MONTHS WILL START FROM THE CURRENT 
    * MONTH AND BACKWARDS.  */
    private function NUMERIC_PAST_SIX_MONTH_FETCHER($TIME_ZONE){
        /* get timezone. */
        date_default_timezone_set($TIME_ZONE);
        /* get the current month integer data in accordance with the supplied timezone. */
        $current_month = date("m");
        /* We dope the "Month_Integer_Manipulator" function with the integer value of the current month, so this function can get us an array of integers, which can automatically 
        * represents past six months in human readable format.  */
        RETURN $this->Month_Integer_Manipulator_2($current_month);
    }






    /* A FUNCTION TO HELP US GET IN HUMAN READABLE FORMAT, THE PAST SIX MONTHS IN ASCENDING ORDER AND INSIDE AN ARRAY. THE COUNTING OF THE PAST SIX MONTHS WILL START FROM THE CURRENT 
    * MONTH AND BACKWARDS.  */
    private function PAST_SIX_MONTH_FETCHER($TIME_ZONE){
        /* get timezone. */
        date_default_timezone_set($TIME_ZONE);
        /*  array to store result   */
        $Result = array();
        /* get the current month integer data in accordance with the supplied timezone. */
        $current_month = date("m");
        /* We dope the "Month_Integer_Manipulator" function with the integer value of the current month, so this function can get us an array of integers, which can automatically 
        * represents past six months in human readable format.  */
        $LAST_SIX_MONTHS = $this->Month_Integer_Manipulator($current_month);
        /* Here we create an array of which contains the full string of the months in human language, arranged in an ascending order. Note that the integer index of this array
        * starts from zero, and we shall be using this index to compare and test with the integer data returned by the date function, by processing this date function integer
        * and then subtracting one from it and then using it to index this array to get the human language equavalent of the integer data returned by the date function. Also
        * note that this our approach would not lead to any error as any integer data to be returned by the date function are all between (1-12) and the date function is invoked
        * inside this function. */
        $TESTING_TUBE = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
        /* we shall be using this loop to loop through our last six months array containing integer that represents the last six month, and hence within this loop we convert this
        * integers to a human readable short format and store it up inside an array.   */
        for ($index = 0; $index < count($LAST_SIX_MONTHS); $index++){
            /* Right here we firstly subtracted one from the "$current_month" variable thats because our "$TESTING_TUBE" array counting starts from zero and therefore since we are
            * using its index to represent the integer month value from our date function, it is only proper for us to always subtract one from it just so everything can be leveked,
            * secondly we chop of the zero before the integer data inside our "$current_month" variable just so we can have an indexable integer to use, offcourse we know the integer
            * data returned from the date function always have a zero infront of it. finally we use our processed integer data to index the "$TESTING_TUBE" array, just to get the
            * human language equivalent of the integer data.   */
            $Result[] = $TESTING_TUBE[ ($LAST_SIX_MONTHS[$index] - 1) ];
        }
        
        /* return the final array results, containing a very presentable last six months data. */
        return $Result;
    }








    /* FUNCTION TO HELP US GET THE PAST SIX MONTHS IN INTEGERS LINED UP IN AN ARRAY, WITH THE INTEGER REPRESENTING THE CURRENT MONTH TO BE THE LAST INDEX IN THIS FUNCTIONS RETURNED
    * ARRAY. NOTE THAT THIS MANIPULATOR HAVE ZERO IN FRONT OF ITS SINGLE NUMBERS WHEN YOU CHECK THE INTEGERS TO BE RETURNED FROM INSIDE THE RETURNED ARRAYS.  */
    private function Month_Integer_Manipulator_2($MONTH_INTEGER){
        /* Here we test the the current month and then return an array of integers representing the past six months with this current month integer as the last of the array to be 
        * returned. Note: that the integere returned inside this functions array result are without zero, this is to aid quick processing for the function calling this function.  */
        IF($MONTH_INTEGER == "12"){
            RETURN array("07", "08", "09", "10", "11", "12");
        }ELSE IF($MONTH_INTEGER == "11"){
            RETURN array("06", "07", "08", "09", "10", "11");
        }ELSE IF($MONTH_INTEGER == "10"){
            RETURN array("05", "06", "07", "08", "09", "10");
        }ELSE IF($MONTH_INTEGER == "09"){
            RETURN array("04", "05", "06", "07", "08", "09");
        }ELSE IF($MONTH_INTEGER == "08"){
            RETURN array("03", "04", "05", "06", "07", "08");
        }ELSE IF($MONTH_INTEGER == "07"){
            RETURN array("02", "03", "04", "05", "06", "07");
        }ELSE IF($MONTH_INTEGER == "06"){
            RETURN array("01", "02", "03", "04", "05", "06");
        }ELSE IF($MONTH_INTEGER == "05"){
            RETURN array("12", "01", "02", "03", "04", "05");
        }ELSE IF($MONTH_INTEGER == "04"){
            RETURN array("11", "12", "01", "02", "03", "04");
        }ELSE IF($MONTH_INTEGER == "03"){
            RETURN array("10", "11", "12", "01", "02", "03");
        }ELSE IF($MONTH_INTEGER == "02"){
            RETURN array("9", "10", "11", "12", "01", "02");
        }ELSE IF($MONTH_INTEGER == "01"){
            RETURN array("08", "09", "10", "11", "12", "01");
        }
    }









    /* FUNCTION TO HELP US GET THE PAST SIX MONTHS IN INTEGERS LINED UP IN AN ARRAY, WITH THE INTEGER REPRESENTING THE CURRENT MONTH TO BE THE LAST INDEX IN THIS FUNCTIONS RETURNED
    * ARRAY. NOTE THAT THIS MANIPULATOR DOESN'T HAVE ZERO IN FRONT OF ITS SINGLE NUMBERS WHEN YOU CHECK THE INTEGERS TO BE RETURNED FROM INSIDE THE RETURNED ARRAYS.  */
    private function Month_Integer_Manipulator($MONTH_INTEGER){
        /* Here we test the the current month and then return an array of integers representing the past six months with this current month integer as the last of the array to be 
        * returned. Note: that the integere returned inside this functions array result are without zero, this is to aid quick processing for the function calling this function.  */
        IF($MONTH_INTEGER == "12"){
            RETURN array("7", "8", "9", "10", "11", "12");
        }ELSE IF($MONTH_INTEGER == "11"){
            RETURN array("6", "7", "8", "9", "10", "11");
        }ELSE IF($MONTH_INTEGER == "10"){
            RETURN array("5", "6", "7", "8", "9", "10");
        }ELSE IF($MONTH_INTEGER == "09"){
            RETURN array("4", "5", "6", "7", "8", "9");
        }ELSE IF($MONTH_INTEGER == "08"){
            RETURN array("3", "4", "5", "6", "7", "8");
        }ELSE IF($MONTH_INTEGER == "07"){
            RETURN array("2", "3", "4", "5", "6", "7");
        }ELSE IF($MONTH_INTEGER == "06"){
            RETURN array("1", "2", "3", "4", "5", "6");
        }ELSE IF($MONTH_INTEGER == "05"){
            RETURN array("12", "1", "2", "3", "4", "5");
        }ELSE IF($MONTH_INTEGER == "04"){
            RETURN array("11", "12", "1", "2", "3", "4");
        }ELSE IF($MONTH_INTEGER == "03"){
            RETURN array("10", "11", "12", "1", "2", "3");
        }ELSE IF($MONTH_INTEGER == "02"){
            RETURN array("9", "10", "11", "12", "1", "2");
        }ELSE IF($MONTH_INTEGER == "01"){
            RETURN array("8", "9", "10", "11", "12", "1");
        }
    }

    
}

