<?php
<form method="post">
<input type="text" name="url" size="65" value="<?php echo $the_url;  ?>"/><br />

<input type="submit" value="Show Emails" />
</form> 
<?php
$the_url = isset($_REQUEST['url']) ? htmlspecialchars($_REQUEST['url']) : '';
 
if (isset($_REQUEST['url']) && !empty($_REQUEST['url'])) {
  // fetch data from specified url
  $text = file_get_contents($_REQUEST['url']);
}
 
// parse emails
if (!empty($text)) {
  $res = preg_match_all(
    "/[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}/i",
    $text,
    $matches
  );
 
  if ($res) {
    foreach(array_unique($matches[0]) as $email) {
      echo $email . "<br />";
    }
  }
  else {
    echo "No emails found.";
  }
}

?>

