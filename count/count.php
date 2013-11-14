<?php
	
	include("func_count.php");
	
	$n='500';
	
	$count = $n/10;
	
	$pos1 = $count - ($count-1);
	
	$pos2 = $pos1+1;
	
	$pos3 = $pos2+1;
	
	$pos4 = $pos3+1;
	
	
	
	echo $pos1;
	echo "&nbsp; - ";
	min_max($pos1);
	
	echo "<br />";
	echo $pos2;
	echo "&nbsp; - ";	
	min_max($pos2);

	echo "<br />";
	echo $pos3;
	echo "&nbsp; - ";	
	min_max($pos3);	

	echo "<br />";
	echo $pos4;
	echo "&nbsp; - ";
	min_max($pos4);

	    $next_page = $pos1 + 1;

	
	if ($pos1 >= $count ){
		
	}

	else{

    echo "<a href='" . $_SERVER['PHP_SELF'] . "?page={$next_page}' title='Next page is {$next_page}.' class='customBtn'>";
        echo "<span style='margin:0 .5em;'> > </span>";
    echo "</a>";

	}
	
	
	
?>