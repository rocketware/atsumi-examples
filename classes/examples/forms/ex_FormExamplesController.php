<?php
class ex_FormExamplesController extends ex_AbstractExampleController {

	function info_simple_form () {
		return 'A very simple form with an oncomplete event. A very simple form with an oncomplete event. A very simple form with an oncomplete event. A very simple form with an oncomplete event.';
	}
	function page_simple_form () {
				
		$form = new widget_Form('form_example');

		$form->add(
			'widget_TextElement',
			array(
				'label'			=> 'Name',
				'name'			=> 'name',
				'validators'	=> array(
					new validate_Required(true)
				)
			)
		);

		$form->add(
			'widget_SelectElement',
			array(
				'label'		=> 'Beverage',
				'name'		=> 'beverage',
				'options'	=> array(
					'tea'		=> 'Tea',
					'coffee'	=> 'Coffee'
				)
			)
		);

		$form->add(
			'widget_TextAreaElement',
			array(
				'name'		=> 'info',
				'validators'	=> array(
				)
			)
		);

		if ($form->completed()) {
			
		} elseif ($form->hasErrors()) {
			
		}
		
		// set the form to the view
		$this->set('form', $form);
		$this->setView('ex_basicFormView');
	}

	function info_formatted_form () {
		return 'A form broken down in to indervidual elements';
	}
	function page_formatted_form () {
		
		
	}

	function info_elements () {
		return 'Form demonstrating various elements';
	}
	function page_elements () {
		
		
	}

	function info_validation () {
		return 'Deomonstrating advanced validation on a form';
	}
	function page_validation () {
		
		
	}
	
}