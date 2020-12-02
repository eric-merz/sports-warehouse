<div class="section-heading-container">
  <h2 class="section-heading">Edit: <?= $selectedItemName ?></h2>
</div>

<form action="edit-single-item.php" method="POST" enctype="multipart/form-data">
  <fieldset>
    <legend>Edit Item</legend>
      <p>
        <label for="itemName">Item Name:</label>
        <input type="text" name="itemName" id="itemName" value="<?= $selectedItemName ?>">
      </p>
      <p>
        <label for="itemPrice">Item Price:</label>
        <input type="number" name="itemPrice" id="itemPrice" min="1" step=".01" value="<?= $selectedItemPrice ?>">
      </p>
      <p>
        <label for="itemSalePrice">Item Sale Price:</label>
        <input type="number" name="itemSalePrice" id="itemSalePrice"  min="1" step=".01" value="<?= $selectedItemSalePrice ?>">
      </p>
      <p>
        <label for="itemDescription">Item Description:</label>
        <textarea name="itemDescription" id="itemDescription"><?= $selectedItemDescription ?></textarea>
      </p>
      <p>
        <label for="itemFeatured">Item Featured:</label>
        <select id="itemFeatured" name="itemFeatured">
          <option value="0">No</option>
          <option value="1">Yes</option>
        </select>
      </p>
      <p>
        <label for="categoryId">Category:</label>
        <select id="categoryId" name="categoryId">
          <?php foreach ($categoryRows as $row):
          $categoryName = $row["categoryName"];
          $categoryId = $row["categoryId"]
          ?>
          <option value="<?= $categoryId ?>"><?= $categoryName ?></option>
          <?php endforeach; ?>
        </select>
      </p>
      <p>
        <label for="photoPath">Photo:</label>
        <input type="file" name="photoPath" value="<?= $selectedItemPhoto ?>">
      </p>
      <p>
        <input type="hidden" name="selectedItem" value="<?= $selectedItemId ?>">
        <input class="edit-category" type="submit" name="modify" value="Modify">
        <input type="submit" name="delete" value="Delete">
      </p>
      <p><?= $message ?></p>
  </fieldset>
</form>