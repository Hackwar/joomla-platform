<?php
/**
 * @package     Joomla.UnitTest
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

/**
 * Test class for JForm.
 *
 * @package     Joomla.UnitTest
 * @subpackage  Form
 *
 * @since       11.1
 */
class JFormRuleEqualsTest extends TestCase
{
	/**
	 * Test the JFormRuleEquals::test method.
	 *
	 * @return void
	 */
	public function testEquals()
	{
		$rule = new JFormRuleEquals;
		$xml = simplexml_load_string('<form><field name="foo" /></form>');

		// Test fail conditions.

		// Test pass conditions.

		$this->markTestIncomplete();
	}
}
