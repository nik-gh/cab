<?php

/*  
 * Built in functions used:
 *   trim()
 *   stripslashes()
 *   htmlspecialchars()
 *   strip_tags()
 *   str_replace()
 *  clean the form data to prevent injections
 */

  function validateFormData($formData) {
      $formData = trim(stripslashes(htmlspecialchars(strip_tags(str_replace
          (array('(', ')'), '', $formData)), ENT_QUOTES)));
      return $formData;
  }
?>