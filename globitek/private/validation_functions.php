<?php

  // is_blank('abcd')
  function is_blank($value='') {
    return $value === '';
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    $ln = strlen($value);
    return $options['min'] <= $ln && $ln <= $options['max'];
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
    return strpos($value, '@') !== FALSE;

    // **** 
    // the way below is probably better lmao, 
    // but I will do it the way that is wanted
    // ****
    // return filter_var($value, FILTER_VALIDATE_EMAIL);
  }

?>
