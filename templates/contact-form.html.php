<?php 
  $title = "Contact Us";
?>


<main class="contact-form">
  <div class="section-heading-container">
    <h2 class="section-heading">Get in touch!</h2>
  </div>
  <p>If you have any questions, we would love to hear from you, please complete the following information.</p>

  <form id="contact-form" action="contact.php" method="post" novalidate>
    <fieldset>
      <!-- <legend>Contact Us</legend> -->
      <p class="input">
        <label for="firstName">First Name *</label>
        <input <?= $form->setErrorClass("firstName") ?> type="text" name="firstName" id="firstName" value="<?= $form->setValue("firstName") ?>">
        <span class="message"><?= $firstNameMessage ?></span>
      </p>

      <p class="input">
        <label for="lastName">Last Name *</label>
        <input <?= $form->setErrorClass("lastName") ?> type="text" name="lastName" id="lastName" value="<?= $form->setValue("lastName") ?>">
        <span class="message"><?= $lastNameMessage ?></span>
      </p>

      <p class="input">
        <label for="phone">Phone</label>
        <input type="tel" name="phone" id="phone" value="<?= $form->setValue("phone") ?>">
      </p>

      <p class="input">
        <label for="email">Email *</label>
        <input <?= $form->setErrorClass("email") ?> type="email" name="email" id="email" value="<?= $form->setValue("email") ?>">
        <span class="message"><?= $emailMessage ?></span>
      </p>

      <p class="input">
        <label for="question">Question *</label>
        <textarea name="question" id="question"><?= $form->setValue("question") ?></textarea>
      </p>
    </fieldset>

    <p>
      <input type="submit" name="submitButton" id="submitButton" value="Send Details">
      <input type="reset" name="resetButton" id="resetButton" value="Reset Form">
    </p>
  </form>
</main>
