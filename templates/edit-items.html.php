<div class="section-heading-container">
  <h2 class="section-heading">Add New Item</h2>
</div>

<form action="edit-items.php" method="POST" enctype="multipart/form-data">
  <fieldset>
    <legend>New Item</legend>
      <p>
        <label for="itemName">Item Name:</label>
        <input type="text" name="itemName" id="itemName" required>
      </p>
      <p>
        <label for="itemPrice">Item Price:</label>
        <input type="number" name="itemPrice" id="itemPrice" min="1" step=".01" required>
      </p>
      <p>
        <label for="itemSalePrice">Item Sale Price:</label>
        <input type="number" name="itemSalePrice" id="itemSalePrice"  min="1" step=".01" required>
      </p>
      <p>
        <label for="itemDescription">Item Description:</label>
        <textarea name="itemDescription" id="itemDescription" required></textarea>
      </p>
      <p>
        <label for="itemFeatured">Item Featured:</label>
        <select id="itemFeatured" name="itemFeatured" required>
          <option value="0" selected>No</option>
          <option value="1">Yes</option>
        </select>
      </p>
      <p>
        <label for="categoryId">Category:</label>
        <select id="categoryId" name="categoryId" required>
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
        <input type="file" name="photoPath">
      </p>
      <p>
        <input class="edit-category" type="submit" name="addNew" value="Add">
      </p>
      <p><?= $message ?></p>
  </fieldset>
  <br>
</form>


<div class="section-heading-container">
  <h2 class="section-heading"><?= $title ?></h2>
</div>

<form action="edit-single-item.php" method="POST">
  <fieldset>
    <legend>Edit Item</legend>
      <p>
        <label for="itemSelected">Item:</label>
        <select id="itemSelected" name="itemSelected">
          <?php foreach ($itemRows as $row):
          $itemName = $row["itemName"];
          $itemId = $row["itemId"]
          ?>
          <option value="<?= $itemId ?>"><?= $itemName ?></option>
          <?php endforeach; ?>
        </select>
      </p>
      <p>
        <input class="edit-category" type="submit" name="edit" value="Edit">
      </p>
  </fieldset>
  <br>
</form>