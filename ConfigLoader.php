<?php
class ConfigLoader
{
	protected $data;
	protected $default = null;
	
	/**
	 * Loads the config file.
	 * @param  string $file path to config file
	 */
	public function load($file)
	{
		$this->data = require $file;
	}
	/**
	 * Gets the config value
	 * @param  string $key     
	 * @param  mixed $default default
	 * @return mixed          the config value
	 */
	public function get($key, $default = null)
	{
		$this->default = $default;

		$parts = explode('.', $key);
		$data = $this->data;

		foreach($parts as $part){
			if(isset($data[$part])){
				$data = $data[$part];
			} else {
				$data = $this->default;
				break;
			}
		}

		return $data;
	}
	/**
	 * Returns true if the config value exists.
	 * @param  string $key config name
	 * @return boolean     true if the value is set.
	 */
	public function exists($key)
	{
		return $this->get($key) != $this->default;
	}
}