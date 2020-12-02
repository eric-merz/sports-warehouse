<div class="section-heading-container">
  <h2 class="section-heading"><?= $title ?></h2>
</div>

<form method="POST" action="change-theme.php">
  <fieldset>
    <legend>Change Theme</legend>
    <label for="changeTheme">Theme:</label>
    <select id="changeTheme" name="changeTheme">
      <option value="darkTheme">Dark Theme</option>
      <option value="style">Light Theme</option>
    </select>
    <input type="submit" value="Change Theme" name="submit">
  </fieldset>
</form>