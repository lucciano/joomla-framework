<?php
/**
 * @copyright  Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Uri\Tests;

use Joomla\Uri\UriImmuteable;

/**
 * Tests for the Joomla\Uri\UriImmuteable class.
 *
 * @since  1.0
 */
class UriImmuteableTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * Object under test
	 *
	 * @var    UriImmuteable
	 * @since  1.0
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	protected function setUp()
	{
		$this->object = new UriImmuteable('http://someuser:somepass@www.example.com:80/path/file.html?var=value#fragment');
	}

	/**
	 * Test the __toString method.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 * @covers  Joomla\Uri\UriImmuteable::__toString
	 */
	public function test__toString()
	{
		$this->assertThat(
			$this->object->__toString(),
			$this->equalTo('http://someuser:somepass@www.example.com:80/path/file.html?var=value#fragment')
		);
	}

	/**
	 * Test the toString method.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 * @covers  Joomla\Uri\UriImmuteable::toString
	 */
	public function testToString()
	{
		$this->assertThat(
			$this->object->toString(),
			$this->equalTo('http://someuser:somepass@www.example.com:80/path/file.html?var=value#fragment')
		);
	}

	/**
	 * Test the hasVar method.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 * @covers  Joomla\Uri\UriImmuteable::hasVar
	 */
	public function testHasVar()
	{
		$this->assertThat(
			$this->object->hasVar('somevar'),
			$this->equalTo(false)
		);

		$this->assertThat(
			$this->object->hasVar('var'),
			$this->equalTo(true)
		);
	}

	/**
	 * Test the getVar method.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 * @covers  Joomla\Uri\UriImmuteable::getVar
	 */
	public function testGetVar()
	{
		$this->assertThat(
			$this->object->getVar('var'),
			$this->equalTo('value')
		);

		$this->assertThat(
			$this->object->getVar('var2'),
			$this->equalTo('')
		);

		$this->assertThat(
			$this->object->getVar('var2', 'default'),
			$this->equalTo('default')
		);
	}

	/**
	 * Test the getQuery method.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 * @covers  Joomla\Uri\UriImmuteable::getQuery
	 */
	public function testGetQuery()
	{
		$this->assertThat(
			$this->object->getQuery(),
			$this->equalTo('var=value')
		);

		$this->assertThat(
			$this->object->getQuery(true),
			$this->equalTo(array('var' => 'value'))
		);
	}

	/**
	 * Test the getScheme method.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 * @covers  Joomla\Uri\UriImmuteable::getScheme
	 */
	public function testGetScheme()
	{
		$this->assertThat(
			$this->object->getScheme(),
			$this->equalTo('http')
		);
	}

	/**
	 * Test the getUser method.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 * @covers  Joomla\Uri\UriImmuteable::getUser
	 */
	public function testGetUser()
	{
		$this->assertThat(
			$this->object->getUser(),
			$this->equalTo('someuser')
		);
	}

	/**
	 * Test the getPass method.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 * @covers  Joomla\Uri\UriImmuteable::getPass
	 */
	public function testGetPass()
	{
		$this->assertThat(
			$this->object->getPass(),
			$this->equalTo('somepass')
		);
	}

	/**
	 * Test the getHost method.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 * @covers  Joomla\Uri\UriImmuteable::getHost
	 */
	public function testGetHost()
	{
		$this->assertThat(
			$this->object->getHost(),
			$this->equalTo('www.example.com')
		);
	}

	/**
	 * Test the getPort method.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 * @covers  Joomla\Uri\UriImmuteable::getPort
	 */
	public function testGetPort()
	{
		$this->assertThat(
			$this->object->getPort(),
			$this->equalTo('80')
		);
	}

	/**
	 * Test the getPath method.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 * @covers  Joomla\Uri\UriImmuteable::getPath
	 */
	public function testGetPath()
	{
		$this->assertThat(
			$this->object->getPath(),
			$this->equalTo('/path/file.html')
		);
	}

	/**
	 * Test the getFragment method.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 * @covers  Joomla\Uri\UriImmuteable::getFragment
	 */
	public function testGetFragment()
	{
		$this->assertThat(
			$this->object->getFragment(),
			$this->equalTo('fragment')
		);
	}

	/**
	 * Test the isSSL method.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 * @covers  Joomla\Uri\UriImmuteable::isSSL
	 */
	public function testIsSSL()
	{
		$this->object = new UriImmuteable('https://someuser:somepass@www.example.com:80/path/file.html?var=value#fragment');

		$this->assertThat(
			$this->object->isSSL(),
			$this->equalTo(true)
		);

		$this->object = new UriImmuteable('http://someuser:somepass@www.example.com:80/path/file.html?var=value#fragment');

		$this->assertThat(
			$this->object->isSSL(),
			$this->equalTo(false)
		);
	}
}
