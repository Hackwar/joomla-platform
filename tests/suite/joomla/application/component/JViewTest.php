<?php
/**
 * @version		$Id: JViewTest.php 20196 2011-01-09 02:40:25Z ian $
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

require_once JPATH_PLATFORM.'/joomla/application/component/view.php';

/**
 * General inspector class for JView.
 *
 * @package Joomla.UnitTest
 * @subpackage Application
 * @since 11.3
 */
class TestCompViewInspector extends JView
{
	/**
	 * Constructor to prevent executing the JView contructor on demand
	 * 
	 * @param   string  $execute  Boolean flag to execute the JView constructor
	 * @param   array   $config   Array with config values
	 */
	public function __construct($execute = false, $config = array())
	{
		if ($execute)
		{
			parent::__construct($config);
		}
	}
	
	/**
	* Method for inspecting protected variables.
	*
	* @return mixed The value of the class variable.
	*/
	public function __get($name)
	{
		if (property_exists($this, $name)) {
			return $this->$name;
		} else {
			trigger_error('Undefined or private property: ' . __CLASS__.'::'.$name, E_USER_ERROR);
			return null;
		}
	}

	/**
	* Sets any property from the class.
	*
	* @param string $property The name of the class property.
	* @param string $value The value of the class property.
	*
	* @return void
	*/
	public function __set($property, $value)
	{
		$this->$property = $value;
	}
	
	/**
	 * Calls any inaccessible method from the class.
	 * 
	 * @param string 	$name Name of the method to invoke 
	 * @param array 	$parameters Parameters to be handed over to the original method
	 * 
	 * @return mixed The return value of the method 
	 */
	public function __call($name, $parameters = false)
	{
		return call_user_func_array(array($this,$name), $parameters);
	}
}

/**
 * Mockup object to test Model handling in JView
 * 
 * @package Joomla.UnitTest
 * @subpackage Application
 * @since 11.3
 */
class ModelMockupJView
{
	public $name = 'model'; 

	public function getName()
	{
		return $this->name;
	}
}

/**
 * Test class for JView.
 * Generated by PHPUnit on 2009-10-08 at 21:21:58.
 */
class JViewTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @todo Implement test__Construct().
	 */
	public function test__Construct()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}
	
	/**
	 * @todo Implement testDisplay().
	 */
	public function testDisplay()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @todo Implement testAssign().
	 */
	public function testAssign()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @todo Implement testAssignRef().
	 */
	public function testAssignRef()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @todo Implement testEscape().
	 */
	public function testEscape()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @todo Implement testGet().
	 */
	public function testGet() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Test JView::getLayout()
	 * 
	 * @since 11.3
	 */
	public function testGetLayout()
	{
		$view = new TestCompViewInspector();

		$this->assertThat(
			$view->getLayout(),
			$this->equalTo('default')
		);

		$view->_layout = 'test';
		
		$this->assertThat(
			$view->getLayout(),
			$this->equalTo('test')
		);
	}

	/**
	 * Test JView::getModel()
	 * 
	 * @since 11.3
	 */
	public function testGetModel()
	{
		//Prepare variable to compare against and a bunch of models
		$models = array();
		$model1 = new ModelMockupJView();
		$models['model'] = $model1;
		$model2 = new ModelMockupJView();
		$model2->name = 'test';
		$models['test'] = $model2;
		$model3 = new ModelMockupJView();
		$model3->name = 'defaulttest';
		$models['defaulttest'] = $model3;
		
		//Prepare JView object
		$view = new TestCompViewInspector();
		$view->_models = $models;
		$view->_defaultModel = 'defaulttest';
		
		//Assert that the function returns the model with the specific key
		$this->assertThat(
			$view->getModel('test'),
			$this->equalTo($model2)
		);
		
		//Assert that the function returns the model with an unspecific key
		$this->assertThat(
			$view->getModel('Model'),
			$this->equalTo($model1)
		);
		
		//Assert that the function returns the default model
		$this->assertThat(
			$view->getModel(),
			$this->equalTo($model3)
		);
	}

	/**
	 * Test JView::getLayoutTemplate()
	 * 
	 * @since 11.3
	 */
	public function testGetLayoutTemplate()
	{
		$view = new TestCompViewInspector();

		$this->assertThat(
			$view->getLayoutTemplate(),
			$this->equalTo('_')
		);

		$view->_layoutTemplate = '-';
		
		$this->assertThat(
			$view->getLayoutTemplate(),
			$this->equalTo('-')
		);
	}

	/**
	 * Test JView::getName()
	 * 
	 * @since 11.3
	 */
	public function testGetName()
	{
		$view = new TestCompViewInspector();
		
		$this->assertThat(
			$view->getName(),
			$this->equalTo('inspector')
		);
		
		$view->_name = 'inspector2';
		
		$this->assertThat(
			$view->getName(),
			$this->equalTo('inspector2')
		);
	}

	/**
	 * Test JView::setModel()
	 * 
	 * @since 11.3
	 */
	public function testSetModel()
	{
		//Prepare variable to compare against and a bunch of models
		$models = array();
		$model1 = new ModelMockupJView();
		$model2 = new ModelMockupJView();
		$model2->name = 'test';
		$model3 = new ModelMockupJView();
		$model3->name = 'defaulttest';
		
		//Prepare JView object
		$view = new TestCompViewInspector();
		
		//Assert that initial state is empty
		$this->assertThat(
			$view->_models,
			$this->equalTo($models)
		);
		
		//Assert that setModel() returns the model handed over
		$this->assertThat(
			$view->setModel($model1),
			$this->equalTo($model1)
		);
		$models['model'] = $model1;
		
		//Assert that model was correctly added to array
		$this->assertThat(
			$view->_models,
			$this->equalTo($models)
		);
		
		//Assert that having more than one model works
		$view->setModel($model2);
		$models['test'] = $model2;
		
		$this->assertThat(
			$view->_models,
			$this->equalTo($models)
		);
		
		//Assert that default model works correctly
		$this->assertThat(
			$view->_defaultModel,
			$this->equalTo('')
		);
		
		$view->setModel($model3, true);
		$models['defaulttest'] = $model3;
		
		$this->assertThat(
			$view->_models,
			$this->equalTo($models)
		);
		
		$this->assertThat(
			$view->_defaultModel,
			$this->equalTo('defaulttest')
		);
	}

	/**
	 * Test JView::setLayout()
	 * 
	 * @since 11.3
	 */
	public function testSetLayout()
	{
		$view = new TestCompViewInspector();

		$this->assertThat(
			$view->_layout,
			$this->equalTo('default')
		);

		$view->setLayout('test');
		
		$this->assertThat(
			$view->_layout,
			$this->equalTo('test')
		);
		
		$this->assertThat(
			$view->_layoutTemplate,
			$this->equalTo('_')
		);
		
		$view->setLayout('-:test2');
		
		$this->assertThat(
			$view->_layout,
			$this->equalTo('test2')
		);
		
		$this->assertThat(
			$view->_layoutTemplate,
			$this->equalTo('-')
		);
	}

	/**
	 * Test JView::setLayoutExt()
	 * 
	 * @since 11.3
	 */
	public function testSetLayoutExt()
	{
		$view = new TestCompViewInspector();

		$this->assertThat(
			$view->_layoutExt,
			$this->equalTo('php')
		);

		$view->setLayoutExt('tmpl');
		
		$this->assertThat(
			$view->_layoutExt,
			$this->equalTo('tmpl')
		);
	}

	/**
	 * Test JView::setEscape()
	 * 
	 * @since 11.3
	 */
	public function testSetEscape()
	{
		$view = new TestCompViewInspector();

		$this->assertThat(
			$view->_escape,
			$this->equalTo('htmlspecialchars')
		);

		$view->setEscape('escapefunc');
		
		$this->assertThat(
			$view->_escape,
			$this->equalTo('escapefunc')
		);

		$view->setEscape(array('EscapeClass', 'func'));
		
		$this->assertThat(
			$view->_escape,
			$this->equalTo(array('EscapeClass', 'func'))
		);
	}

	/**
	 * @todo Implement testAddTemplatePath().
	 */
	public function testAddTemplatePath()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @todo Implement testAddHelperPath().
	 */
	public function testAddHelperPath()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @todo Implement testLoadTemplate().
	 */
	public function testLoadTemplate()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @todo Implement testLoadHelper().
	 */
	public function testLoadHelper()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @todo Implement test_setPath().
	 */
	public function test_setPath()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @todo Implement test_addPath().
	 */
	public function test_addPath()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @todo Implement test_createFileName().
	 */
	public function test_createFileName()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}
}