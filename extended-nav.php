<?php
// set the arguments for wp_list_pages - it's important that you set echo => 0

$args = array(
	'depth'			  => 0,
	'post_type'   => 'page',
	'post_status' => 'publish',
	'echo'			  => 0,
	'sort_column' => 'menu_order, post_title',
	'title_li'    => __('')
);
			
// split the list of pages into n columns
// first, create an array of all the <li>'s
			
$pages = wp_list_pages($args);
$pages_array = explode("</li>", $pages);

// second, count the array and divide

$number_of_pages = count($pages_array);
$pages_per_col = round($number_of_pages / 2);
	
// then iterate over all pages
// $first_col is where i is smaller then pages_per_col
// $second_col is where i is greater

$first_col = "";
$second_col = "";
			
for ($i = 0; $i < $number_of_pages; $i++) {
  if ($i < $pages_per_col) {
		$first_col = $first_col . ' ' . $pages_array[$i] . '</li>';
	} elseif ($i >= $pages_per_col) {
		$second_col = $second_col . ' ' . $pages_array[$i] . '</li>';
	}
}
?>
<div class="row">
  <div class="col-md-6">
  	<?php echo $first_col; ?>
  </div>
  <div class="col-md-6">
  	<?php echo $second_col; ?>
  </div>
</div>
