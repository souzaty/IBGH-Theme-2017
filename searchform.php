<?php
/** Template Name: Search Form **/
<form role='search' method='get' class='search-form' action='" . esc_url(home_url('/')) . "'>
	<div class='box box-header navbar-custom-hospital clearColor'>
		<div class='container-2'><span class='icon'>
			<i class='fa fa-search'></i>
			</span><input class='navbar-custom-hospital clearColor' type='search' id='search' placeholder='pesquisar...' value='" . get_search_query() . "' name='s' />
		</div>
	</div>
</form>
