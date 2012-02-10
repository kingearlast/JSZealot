<?php
    function page_redirect($url) {
    	echo "<script>
			      location.replace('$url');
			  </script>";
    }
	
	function page_alert($msg) {
		echo "<script>
			      alert('$msg');
			  </script>";
	}
	
	function page_alert_and_redirect($msg, $url) {
		page_alert($msg);
		page_redirect($url);
	}
?>