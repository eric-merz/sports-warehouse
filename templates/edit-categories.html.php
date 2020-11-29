<div class="section-heading-container">
  <h2 class="section-heading">Add New Category</h2>
</div>

<form action="edit-categories.php" method="POST">
  <p>
    <span>
      <label for="newCategory">New Category</label>
    </span>
    <span>
      <input type="text" id="newCategory" name="newCategory" required>
    </span>
    <span>
      <input type="submit" name="addNew" value="Add">
    </span>
  </p>
  <p><?= $message ?></p>
</form>

<div class="section-heading-container">
  <h2 class="section-heading"><?= $title ?></h2>
</div>

<table>
  <tr>
    <th>Category</th>
    <th>Rename To</th>
    <th></th>
  </tr>

  <?php foreach ($categoryRows as $row):
    $categoryName = $row["categoryName"];
    $categoryId = $row["categoryId"];
    ?>
    
    <tr>
      <td><?= $categoryName ?></td>
      <form action="edit-categories.php" method="POST">
        <td>
          <input type="text" id="modifyCategory" name="modifyCategory">
        </td>
        <td>
          <input type="submit" name="modify" value="Modify">
          <input type="submit" name="delete" value="Delete">
          <input type="hidden" name="categoryId" value="<?= $categoryId ?>" >
        </td>
      </form>

    </tr>
  <?php endforeach; ?>
</table>