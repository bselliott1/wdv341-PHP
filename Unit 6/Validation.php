<?php

	class validations {

		public function __construct() {
			//empty constructor
    	}

		public function cannotBeEmpty($inFieldValue){

			return empty($inFieldValue);
		}  

  		public function validateName($inName) {
      		$isEmpty = self::cannotBeEmpty($inName);
      		if ($isEmpty) {
        		return false;
      		} else {
        		return $inName = preg_replace('/[^A-Za-z\ ]/', '', $inName);
      		}
    	}


		public function validatePhone($inPhone) {
			$isEmpty = self::cannotBeEmpty($inPhone);
			if ($isEmpty){
				false;
			}else{
      		$inPhone = filter_var($inPhone, FILTER_SANITIZE_NUMBER_INT);

      		if (strlen($inPhone) == 10) {
         		return true;
      		} else {
        		return false;
      		}
    	}
    	}

    public function validateEmail($inEmail){
			
			$inEmail = filter_var($inEmail, FILTER_SANITIZE_EMAIL);

			return filter_var($inEmail, FILTER_VALIDATE_EMAIL);
		}

    public function validateRegistration($inRegistration) {
      if($inRegistration == "" && strlen($inRegistration <= 200)) {
        return false;
      } else {
         return true;
       }
    }

    public function validateBadge($inRadioValue) {
      if($inRadioValue == "") {
        return false;
      } else {
         return true;
       }
    }

    public function validateMeal($inMeal){
    	if($inMeal == ""){
    		return false;
    	} else {
    		return true;
    	}
    }

    public function validateSpecial($inSpecial){
    	return $inSpecial = preg_replace('/[^A-Za-z0-9\ ]/', '', $inSpecial);
    }

  }
?>