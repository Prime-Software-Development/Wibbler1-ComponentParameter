<?php
namespace Trunk\Component\Parameter;

class ParameterBag implements \IteratorAggregate, \Countable {

	protected $parameters;

	public function __construct(array $parameters = array())
	{
		$this->parameters = $parameters;
	}

	public function has($name)
	{
		return array_key_exists($name, $this->parameters);
	}

	public function get($name, $default = null)
	{
		if($this->has($name)) {
			return $this->parameters[$name];
		}

		return $default;
	}

	public function set($name, $value)
	{
		$this->parameters[$name] = $value;

		return $this;
	}

	public function remove($name)
	{
		if($this->has($name)){
			unset($this->parameters[$name]);
		}

		return $this;
	}

	public function add(array $parameters = array())
	{
		$this->parameters = array_replace($this->parameters, $parameters);

		return $this;
	}

	/**
	 * * Replaces the current parameters by a new set.
	 *
	 * @param array $parameters An array of parameters
	 *
	 * @return $this
	 */
	public function replace(array $parameters = array())
	{
		$this->parameters = $parameters;

		return $this;
	}

	/**
	 * Returns an iterator for parameters.
	 *
	 * @return \ArrayIterator
	 */
	public function getIterator()
	{
		return new \ArrayIterator($this->parameters);
	}

	/**
	 * Count parameters
	 * @return int
	 */
	public function count()
	{
		return count($this->parameters);
	}
}
