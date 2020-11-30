<?php
require('src/inc/pdo.php');
require('src/inc/functions.php');

$errors = [];

if (!empty($_POST['submit'])) {
    $message = checkXss($_POST['message']);
    $errors = checkField($errors, $message, 'message', 3, 2000);
    if (count($errors) == 0) insert($pdo, 'lf_contact', ['message'], [$message]);
}

include('src/template/header.php');
?>

<div class="container">
    <form class="mt-5" action="" method="POST">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Message:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" placeholder="Votre message..."><?= (!empty($_POST['message'])) ? $_POST['message'] : '' ?></textarea>
            <?php if (!empty($errors['message'])) : ?>
                <div class="p-3 mb-2 mt-3 bg-danger text-white"><?= $errors['message'] ?></div>
            <?php endif; ?>
        </div>
        <input type="submit" name="submit" value="Envoyer" class="btn btn-dark">
    </form>
</div>

<?php include('src/template/footer.php'); ?>