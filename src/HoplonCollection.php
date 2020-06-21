<?php

namespace hoplon;

class HoplonCollection implements IHoplonCollection
{
	private $collection;

	public function __construct()
	{
		$this->collection = [];
	}

	public function Add($key, $subIndex, $value)
	{
		$return = false;

		if (array_search($value, $this->collection[$key][$subIndex] ?? []) === false) {
			$this->collection[$key][$subIndex][] = $value;

			$return = true;
		}

		sort($this->collection[$key][$subIndex]);
		ksort($this->collection[$key]);
		ksort($this->collection);

		return $return;
	}

	public function Get($key, $startIndex, $endIndex)
	{
		if ( ! isset($this->collection[$key])) {
			return false;
		}

		$subIndexes = $this->collection[$key];
		$output = [];

		foreach ($subIndexes as $subIndex) {
			$output = array_merge($output, $subIndex);
		}

		if ($startIndex < 0) {
			$startIndex = 0;
		}

		$length = $endIndex - $startIndex;

		if ($length == 0) {
			$length = 1;
		}

		if ($endIndex < 0) {
			$length = $endIndex + 1;
		}

		if ($length == 0) {
			$length = null;
		}

		return array_slice($output, $startIndex, $length);
	}

	public function RemoveElement($key)
	{
		if ( ! isset($this->collection[$key])) {
			return false;
		}

		unset($this->collection[$key]);

		return true;
	}

	public function RemoveValuesFromSubIndex($key, $subIndex)
	{
		if ( ! isset($this->collection[$key])) {
			return false;
		}

		if ( ! isset($this->collection[$key][$subIndex])) {
			return false;
		}

		unset($this->collection[$key][$subIndex]);

		return true;
	}
}
