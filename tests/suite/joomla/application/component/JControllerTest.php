<?php
/**
 * @version		$Id: JControllerTest.php 20196 2011-01-09 02:40:25Z ian $
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

require_once JPATH_PLATFORM.'/joomla/application/component/controller.php';
require_once JPATH_PLATFORM.'/joomla/environment/request.php';

/**
 * Test class for JController.
 * Generated by PHPUnit on 2009-10-08 at 21:18:27.
 */
class JControllerTest extends PHPUnit_Framework_TestCase
{
	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		if (!defined('JPATH_COMPONENT')) {
			define('JPATH_COMPONENT', JPATH_BASE.'/components/com_foobar');
		}

		include_once 'JControllerHelper.php';
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
	}

	/**
	 * Test JController::__construct
	 *
	 * @since	1.6
	 */
	public function test__construct()
	{
		$controller = new TestTestController;
		$this->assertThat(
			$controller->getTasks(),
			$this->equalTo(
				array(
					'task5', 'task1', 'task2', 'display'
				)
			),
			'Line:'.__LINE__.' The available tasks should be the public tasks in _all_ the derived classes after controller plus "display".'
		);
	}

	/**
	 * Test JController::addModelPath
	 *
	 * @since	1.6
	 */
	public function testAddModelPath()
	{
		// Include JModel as this method is a proxy for JModel::addIncludePath
		require_once JPATH_PLATFORM.'/joomla/application/component/model.php';

		$path = JPath::clean(JPATH_ROOT.'/addmodelpath');
		JController::addModelPath($path);

		// The default path is the class file folder/forms
		$valid = JPATH_PLATFORM.'/joomla/form/fields';

		$this->assertThat(
			in_array($path, JModel::addIncludePath()),
			$this->isTrue(),
			'Line:'.__LINE__.' The path should be added to the JModel paths.'
		);
	}

	/**
	 * Test JController::addPath
	 *
	 * Note that addPath call JPath::check which will exit if the path is out of bounds.
	 * If execution halts for some reason, a bad path could be the culprit.
	 *
	 * @since	1.6
	 */
	public function testAddPath()
	{
		$controller = new JControllerInspector;

		$path = JPATH_ROOT.'//foobar';
		$controller->addPath('test', $path);
		$paths = $controller->getPaths();

		$this->assertThat(
			isset($paths['test']),
			$this->isTrue(),
			'Line:'.__LINE__.' The path type should be set.'
		);

		$this->assertThat(
			is_array($paths['test']),
			$this->isTrue(),
			'Line:'.__LINE__.' The path type should be an array.'
		);

		$this->assertThat(
			$paths['test'][0],
			$this->equalTo(JPATH_ROOT.DS.'foobar/'),
			'Line:'.__LINE__.' The path type should be present, clean and with a trailing slash.'
		);
	}

	/**
	 * Test JController::addViewPath
	 */
	public function testAddViewPath()
	{
		$controller = new JControllerInspector;

		$path = JPATH_ROOT.'/views';
		$controller->addViewPath($path);
		$paths = $controller->getPaths();

		$this->assertThat(
			isset($paths['view']),
			$this->isTrue(),
			'Line:'.__LINE__.' The path type should be set.'
		);

		$this->assertThat(
			is_array($paths['view']),
			$this->isTrue(),
			'Line:'.__LINE__.' The path type should be an array.'
		);

		$this->assertThat(
			$paths['view'][0],
			$this->equalTo(JPATH_ROOT.DS.'views/'),
			'Line:'.__LINE__.' The path type should be present, clean and with a trailing slash.'
		);
	}

	/**
	 * Test JController::authorize
	 */
	public function testAuthorize()
	{
		$this->markTestSkipped('This method is depracated.');
	}

	/**
	 * Test JController::createModel
	 */
	public function testCreateModel()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Test JController::createView
	 */
	public function testCreateView()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Test JController::display
	 */
	public function testDisplay()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Test JController::execute
	 */
	public function testExecute()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Test JController::getInstance
	 */
	public function testGetInstance()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Tests JController::getInstance for exception handling.
	 *
	 * @return  void
	 *
	 * @expectedException  Exception
	 * @since   11.3
	 */
	public function testGetInstanceException()
	{
		JController::getInstance('not-found');
	}

	/**
	 * Test JController::getModel
	 */
	public function testGetModel()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Test JController::getName
	 */
	public function testGetName()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Test JController::getTask
	 */
	public function testGetTask()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Test JController::getTasks
	 */
	public function testGetTasks()
	{
		$controller = new TestController;

		$this->assertThat(
			$controller->getTasks(),
			$this->equalTo(
				array(
					'task1', 'task2', 'display'
				)
			),
			'Line:'.__LINE__.' The available tasks should be the public tasks in the derived controller plus "display".'
		);
	}

	/**
	 * Test JController::getView
	 */
	public function testGetView()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Test JController::redirect
	 */
	public function testRedirect()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Test JController::registerDefaultTask
	 */
	public function testRegisterDefaultTask()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Test JController::registerTask
	 */
	public function testRegisterTask()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Test JController::setAccessControl
	 */
	public function testSetAccessControl()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Test JController::setMessage
	 */
	public function testSetMessage()
	{
		$controller = new JControllerInspector;
		$controller->setMessage('Hello World');

		$this->assertEquals($controller->message, 'Hello World',
							'Line:'.__LINE__.' The message text does not equal with previuosly set one');

		$this->assertEquals($controller->messageType, 'message',
							'Line:'.__LINE__.' Default message type should be "message"');

		$controller->setMessage('Morning Universe', 'notice');

		$this->assertEquals($controller->message, 'Morning Universe',
							'Line:'.__LINE__.' The message text does not equal with previuosly set one');

		$this->assertEquals($controller->messageType, 'notice',
							'Line:'.__LINE__.' The message type does not equal with previuosly set one');
	}

	/**
	 * Test JController::setPath
	 */
	public function testSetPath()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Test JController::setRedirect
	 */
	public function testSetRedirect()
	{
		$controller = new JControllerInspector;

		// Set the URL only
		$controller->setRedirect('index.php?option=com_foobar');

		$this->assertEquals(
			$controller->redirect,
			'index.php?option=com_foobar',
			'Line:'.__LINE__.' The redirect address does not equal with passed one'
		);

		$this->assertNull(
			$controller->message,
			'Line:'.__LINE__.' The message is not set, so it should be null'
		);

		$this->assertEquals(
			$controller->messageType,
			'message',
			'Line:'.__LINE__.' Default message type should be "message"'
		);

		// Set the URL and message
		$controller->setRedirect('index.php?option=com_foobar', 'Hello World');

		$this->assertEquals(
			$controller->redirect,
			'index.php?option=com_foobar',
			'Line:'.__LINE__.' The redirect address does not equal with passed one'
		);

		$this->assertEquals(
			$controller->message,
			'Hello World',
			'Line:'.__LINE__.' The message text does not equal with passed one'
		);

		$this->assertEquals(
			$controller->messageType,
			'message',
			'Line:'.__LINE__.' Default message type should be "message"'
		);

		// URL, message and message type
		$controller->setRedirect('index.php?option=com_foobar', 'Morning Universe', 'notice');

		$this->assertEquals(
			$controller->redirect,
			'index.php?option=com_foobar',
			'Line:'.__LINE__.' The redirect address does not equal with passed one'
		);

		$this->assertEquals(
			$controller->message,
			'Morning Universe',
			'Line:'.__LINE__.' The message text does not equal with passed one');

		$this->assertEquals(
			$controller->messageType,
			'notice',
			'Line:'.__LINE__.' The message type does not equal with passed one'
		);

		// With previously set message
		// URL
		$controller->setMessage('Hi all');
		$controller->setRedirect('index.php?option=com_foobar');

		$this->assertEquals(
			$controller->redirect,
			'index.php?option=com_foobar',
			'Line:'.__LINE__.' The redirect address does not equal with passed one'
		);

		$this->assertEquals(
			$controller->message,
			'Hi all',
			'Line:'.__LINE__.' The message text does not equal with previously set one'
		);

		$this->assertEquals(
			$controller->messageType,
			'message',
			'Line:'.__LINE__.' Default message type should be "message"'
		);

		// URL and message
		$controller->setMessage('Hi all');
		$controller->setRedirect('index.php?option=com_foobar', 'Bye all');

		$this->assertEquals(
			$controller->redirect,
			'index.php?option=com_foobar',
			'Line:'.__LINE__.' The redirect address does not equal with passed one'
		);

		$this->assertEquals(
			$controller->message,
			'Bye all',
			'Line:'.__LINE__.' The message text should be overridden'
		);

		$this->assertEquals(
			$controller->messageType,
			'message',
			'Line:'.__LINE__.' Default message type should be "message"'
		);

		// URL, message and message type
		$controller->setMessage('Hi all');
		$controller->setRedirect('index.php?option=com_foobar', 'Bye all', 'notice');

		$this->assertEquals(
			$controller->redirect,
			'index.php?option=com_foobar',
			'Line:'.__LINE__.' The redirect address does not equal with passed one'
		);

		$this->assertEquals(
			$controller->message,
			'Bye all',
			'Line:'.__LINE__.' The message text should be overridden'
		);

		$this->assertEquals(
			$controller->messageType,
			'notice',
			'Line:'.__LINE__.' The message type should be overridden'
		);

		// URL and message type
		$controller->setMessage('Hi all');
		$controller->setRedirect('index.php?option=com_foobar', null, 'notice');

		$this->assertEquals(
			$controller->redirect,
			'index.php?option=com_foobar',
			'Line:'.__LINE__.' The redirect address does not equal with passed one'
		);

		$this->assertEquals(
			$controller->message,
			'Hi all',
			'Line:'.__LINE__.' The message text should not be overridden'
		);

		$this->assertEquals(
			$controller->messageType,
			'notice',
			'Line:'.__LINE__.' The message type should be overridden'
		);

		// With previously set message and message type
		// URL
		$controller->setMessage('Hello folks', 'notice');
		$controller->setRedirect('index.php?option=com_foobar');

		$this->assertEquals(
			$controller->redirect,
			'index.php?option=com_foobar',
			'Line:'.__LINE__.' The redirect address does not equal with passed one'
		);

		$this->assertEquals(
			$controller->message,
			'Hello folks',
			'Line:'.__LINE__.' The message text does not equal with previously set one'
		);

		$this->assertEquals(
			$controller->messageType,
			'notice',
			'Line:'.__LINE__.' The message type does not equal with previously set one'
		);

		// URL and message
		$controller->setMessage('Hello folks', 'notice');
		$controller->setRedirect('index.php?option=com_foobar', 'Bye, Folks');

		$this->assertEquals(
		$controller->redirect,
			'index.php?option=com_foobar',
			'Line:'.__LINE__.' The redirect address does not equal with passed one'
		);

		$this->assertEquals(
			$controller->message,
			'Bye, Folks',
			'Line:'.__LINE__.' The message text should be overridden'
		);

		$this->assertEquals(
			$controller->messageType,
			'notice',
			'Line:'.__LINE__.' The message type does not equal with previously set one'
		);

		// URL, message and message type
		$controller->setMessage('Hello folks', 'notice');
		$controller->setRedirect('index.php?option=com_foobar', 'Bye, folks', 'notice');

		$this->assertEquals(
			$controller->redirect,
			'index.php?option=com_foobar',
			'Line:'.__LINE__.' The redirect address does not equal with passed one'
		);

		$this->assertEquals(
			$controller->message,
			'Bye, folks',
			'Line:'.__LINE__.' The message text should be overridden'
		);

		$this->assertEquals(
			$controller->messageType,
			'notice',
			'Line:'.__LINE__.' The message type should be overridden'
		);

		// URL and message type
		$controller->setMessage('Folks?', 'notice');
		$controller->setRedirect('index.php?option=com_foobar', null, 'question');

		$this->assertEquals(
			$controller->redirect,
			'index.php?option=com_foobar',
			'Line:'.__LINE__.' The redirect address does not equal with passed one'
		);

		$this->assertEquals(
			$controller->message,
			'Folks?',
			'Line:'.__LINE__.' The message text should not be overridden'
		);

		$this->assertEquals(
			$controller->messageType,
			'question',
			'Line:'.__LINE__.' The message type should be overridden'
		);
	}
}