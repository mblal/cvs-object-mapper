<?php

namespace FOM\Writer;

/**
 * Interface WriterInterface
 * 
 * @package FOM\Writer
 */
interface WriterInterface {
	
	/**
	 *
	 * @param
	 *        	$filename
	 * @param
	 *        	$data
	 */
	public function toFile($filename, $data);
	
	/**
	 *
	 * @param $data
	 *        	
	 * @return string
	 */
	public function toString($data);
}