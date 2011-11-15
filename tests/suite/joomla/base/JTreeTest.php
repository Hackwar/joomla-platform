<?php
/**
 * @package     Joomla.UnitTest
 * @subpackage  Base
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

require_once JPATH_PLATFORM.'/joomla/base/tree.php';

/**
 * Test class for JTree.
 * Generated by PHPUnit on 2009-10-08 at 11:46:58.
 */
class JTreeTest extends PHPUnit_Framework_TestCase {
	/**
	 * @var	JTree
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() {
		$this->object = new JTree;
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown() {
	}

	/**
	 * Test JTree::__construct().
	 */
	public function test__construct() {
		$this->assertInstanceOf(
			'JNode',
			$this->object->get('_root')
		);
		
		$this->assertThat(
			$this->object->get('_root'),
			$this->equalTo($this->object->get('_current'))
		);
	}
	
	/**
	 * Test JTree::addChild().
	 */
	public function testAddChild() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Test JTree::getParent().
	 */
	public function testGetParent() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @todo Implement testReset().
	 */
	public function testReset() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}
}
