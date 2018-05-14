<?php
	// PHP file to check if requested form variables are not null

	function filled_out($form_vars) {
		// test that if each variable has a value
		foreach ($form_vars as $key => $value) {
			if ((!isset($key)) || ($value == '')) {
				return false;
			}
		}
		return true;
	}
?>