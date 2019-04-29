<?php

  class eventValidations {

    public function __construct() {
      //empty constructor
      }

    public function cannotBeEmpty($inFieldValue){

      return empty($inFieldValue);
    }  

      public function validate_eventName($in_event_name) {
          $isEmpty = self::cannotBeEmpty($in_event_name);
          if ($isEmpty) {
            return false;
          } else {
            return $in_event_name = preg_replace('/^[0-9]/', '', $in_event_name);
          }
      }

    public function validate_presenter($in_presenter) {
          $isEmpty = self::cannotBeEmpty($in_presenter);
          if ($isEmpty) {
            return false;
          } else {
            return $in_presenter = preg_replace('/[^A-Za-z\ ]/', '', $in_presenter);
          }
      }

    public function validateEventDate($ineventDate) {
      $isEmpty = self::cannotBeEmpty($ineventDate);
      if ($isEmpty) {
        return false;
      } else {
        return $ineventDate;
      }
    }

    public function validateEventTime($ineventTime) {
      $isEmpty = self::cannotBeEmpty($ineventTime);
      if ($isEmpty) {
        return false;
      } else {
        return $ineventTime;
      }
    }

    public function validateSpecial($inSpecial){
      return $inSpecial = preg_replace('/[^A-Za-z0-9\ ]/', '', $inSpecial);
    }

  }
?>