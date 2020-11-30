<div class="section-heading-container">
  <h2 class="section-heading"><?= $title ?></h2>
</div>

<form method="POST" action="change-theme.php">
  <fieldset>
    <legend>Change Theme</legend>
    <label for="changeTheme">Theme:</label>
    <select id="changeTheme" name="changeTheme">
      <?php if($theme == "darkTheme.css"): ?>
        <option value="darkTheme" selected>Dark Theme</option>
      <?php else: ?>
        <option value="darkTheme">Dark Theme</option>
      <?php endif;
      
      if($theme == "style.css"): ?>
        <option value="style" selected>Light Theme</option>
      <?php else: ?>
        <option value="style">Light Theme</option>
      <?php endif; ?>
    </select>
    <input type="submit" value="Change Theme" name="submit">
  </fieldset>
</form>