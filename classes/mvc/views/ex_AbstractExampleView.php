<?php
abstract class ex_AbstractExampleView extends ex_AbstractHtmlView {

	function renderHeadCss () {
			parent::renderHeadCss();
	?>
	<style>
	.header {
		backround-color:#fff;
	}
	.header h1 {
		float:left;
	}
	.header .details {
		float:right;
		text-align:right;
		max-width:25em;
	}
	.header .details p {
		margin-top:5px;
		font-size:0.85em;
	}
	.example {
		background-color:#eee;
		padding:10px;
		border-radius:10px;
	}
	.example pre {
		font-size:13px; overflow-x:auto; padding:20px; background-color:#f4f4f4;
		margin:0;	
		border:1px solid #e7e7e7;
	}
	</style>
	<?php
				
	}

	protected function renderBody () {
		pfl ('<body>');
		pfl('<div class="header">');
		pfl('<h1><a href="%s">Atsumi Examples</a></h1>', Atsumi::app__createUri('ex_IndexController', ''));
		pfl('<div class="details"><strong>%s</strong> <cite>%s</cite><p>%s</p></div>', 
			$this->get_method, $this->get_controller, $this->get_info);
		pfl('<br clear="both" />');
		pfl('</div>');
		pfl('<div class="example">');
		$this->renderBodyContent ();
		pf ('</div></body>');
	}
	

}

?>