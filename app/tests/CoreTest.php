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
	 * Test Blog Index Page Response.
	 */
	public function testGetBlogIndex()
	{
		$crawler = $this->client->request('GET', 'blog');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

	/**
	 * Test Portfolio Index Page Response.
	 */
	public function testGetPortfolioIndex()
	{
		$crawler = $this->client->request('GET', 'portfolio');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

	/**
	 * Test Portfolio Index Page Response.
	 */
	public function testGetContactIndex()
	{
		$crawler = $this->client->request('GET', 'contact');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

}