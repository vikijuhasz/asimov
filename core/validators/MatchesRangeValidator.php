<?php
namespace Core\Validators;
use Core\Validators\CustomValidator;
use Core\H;

class MatchesRangeValidator extends CustomValidator 
{
    public function runValidation()
    {
      $value = $this->_model->{$this->field};
      foreach ($this->rule as $rule) {
          if ($value == $rule) {
              return true;
          }
      }
      return false;
    }
}

