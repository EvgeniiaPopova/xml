<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 26.04.17
 */

namespace Generate\Form;

class CustomRadio extends \PFBC\Element\Radio
{
    /**
     * @return \PFBC\Element\Radio
     */
    public function render()
    {
        $labelClass = $this->_attributes["type"];
        if (!empty($this->inline))
            $labelClass .= " inline";

        $count = 0;
        foreach ($this->options as $value => $text) {
            $value = $this->getOptionValue($value);
            $text = $this->determineCustomer($value);

            echo '<label class="', $labelClass . '"> <input id="', $this->_attributes["id"], '-', $count, '"', $this->getAttributes(array("id", "value", "checked")), ' value="', $this->filter($value), '"';
            if (isset($this->_attributes["value"]) && $this->_attributes["value"] == $value)
                echo ' checked="checked"';
            echo '/> ', $text, ' </label> ';
            ++$count;
        }
    }

    /**
     * Determine of is_new_customer
     * @param $value
     * @return string
     */
    public function determineCustomer($value)
    {
        switch ($value) {
            case CustomForm::CUSTOMER_IS_NEW_YES:
                return 'Yes';
            case CustomForm::CUSTOMER_IS_NEW_NO:
            default:
                return 'No';
        }
    }
}
