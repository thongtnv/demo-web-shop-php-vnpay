<?php

require_once 'config.php';
$link = '';
if (isset($_POST['create_link']) && !empty($_POST['create_link']) && $_POST['create_link'] == 1) {
    $link = (new ProcessFactory)->getLink();
}

if (!isset($link) OR empty($link)) {
    require_once 'getlink_form.php';
} else {
    require_once 'getlink_result.php';
}
?>