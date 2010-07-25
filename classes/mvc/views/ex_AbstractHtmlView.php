<?php
abstract class ex_AbstractHtmlView extends mvc_HtmlView {
	
	
	protected function renderHeadContent () {
		pfl ('<title>Atsumi Examples: %h</title>', $this->getTitle ());
		$this->renderHeadCss ();
		$this->renderHeadJs ();
	}
	
	function renderHeadCss () {
			
	?>
	<style>
	body { font-family:helvetica, verdana; font-size:80%; }
	a { color:#2ca900; }
	p {	color:#777; }
	h1 { margin-top:0; }
	</style>
	<?php
				
	}
	

}

?>