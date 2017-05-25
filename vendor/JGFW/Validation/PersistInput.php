<?php 

namespace JGFW\Validation;

class PersistInput
{
	public function set($inputs)
	{
		foreach($inputs as $key => $value)
		{
			if(!$_SESSION['input'] || (empty($_SESSION['input'])))
			{
				$_SESSION['input'][$key] = [];
			}

			$_SESSION['input'][$key] = $value;

		}
	}

	public function getInput($value)
    {
        if(isset($_SESSION['input'][$value]))
        {
            $input = $_SESSION['input'][$value];
        }
        $this->removeInput($value);
        return isset($input) ? $input : '';
    }

    public function removeInput($value)
    {
        unset($_SESSION['input'][$value]);
    }
}