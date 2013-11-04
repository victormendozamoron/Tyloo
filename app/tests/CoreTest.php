<?php

class CoreTest extends TestCase {

	/**
	 * Test Home Page Response.
	 */
	public function testGetHome()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

	/**
	 * Test Blog Page Response.
	 */
	public function testGetBlogIndex()
	{
		$crawler = $this->client->request('GET', '/blog');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

}