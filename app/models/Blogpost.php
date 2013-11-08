<?php

class Blogpost extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	protected $softDelete = true;
}
