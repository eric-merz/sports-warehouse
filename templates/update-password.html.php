<form action="update-password.php" method="POST">
  <fieldset>
    <legend>Update password</legend>
    <p>
      <label for="newPassword">New password:</label>
      <input type="password" id="newPassword" name="newPassword" required>
    </p>
    <p>
      <input type="submit" value="Update password">
    </p>
  </fieldset>
</form>
<p><?= $message ?></p>