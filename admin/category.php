<!--https://www.thesoftwareguy.in/create-category-tree-php-mysql/-->
<?php
function fetchCategoryTree($parent = 0, $spacing = '', $user_tree_array = '') {
 
    if (!is_array($user_tree_array))
    require "index.php";
    $conn = conn_db();
    $user_tree_array = array();

    $sql = "SELECT `cate_id`, `cate_name`, `parent_id` FROM `category` WHERE 1 AND `parent_id` = $parent ORDER BY cate_id ASC";
    $query = mysql_query($sql);
 if (mysql_num_rows($query) > 0) {
   while ($row = mysql_fetch_object($query)) {
     $user_tree_array[] = array("cate_id" => $row->cate_id, "cate_name" => $spacing . $row->cate_name);
     $user_tree_array = fetchCategoryTree($row->cate_id, $spacing . '&nbsp;&nbsp;', $user_tree_array);
   }
 }
 return $user_tree_array;
}
?>
<?php 
$categoryList = fetchCategoryTree();
?>
<select>
<?php foreach($categoryList as $cl) { ?>
  <option value="<?php echo $cl["cate_id"] ?>"><?php echo $cl["cate_name"]; ?></option>
<?php } ?>
</select>
<?php
function fetchCategoryTreeList($parent = 0, $user_tree_array = '') {
 
 if (!is_array($user_tree_array))
 $user_tree_array = array();

$sql = "SELECT `cate_id`, `cate_name`, `parent_id` FROM `category` WHERE 1 AND `parent` = $parent ORDER BY cate_id ASC";
$query = mysql_query($sql);
if (mysql_num_rows($query) > 0) {
  $user_tree_array[] = "<ul>";
 while ($row = mysql_fetch_object($query)) {
   $user_tree_array[] = "<li>". $row->cate_name."</li>";
   $user_tree_array = fetchCategoryTreeList($row->cate_id, $user_tree_array);
 }
 $user_tree_array[] = "</ul>";
}
return $user_tree_array;
}

?>
<ul>
<?php
  $res = fetchCategoryTreeList();
  foreach ($res as $r) {
    echo  $r;
  }
?>
</ul>
 View Demo