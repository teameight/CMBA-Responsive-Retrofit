<?
$search_refer = $_GET["post_type"];
if ($search_refer == 'wolfe_members') { load_template(STYLESHEETPATH . '/functions/searchtemplate_members.php'); }
elseif ($search_refer == 'CUSTOM_POST_TYPE') { load_template(STYLESHEETPATH . '/functions/searchtemplate_normal.php'); };
?>