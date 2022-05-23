<?php
require_once ROOT . '/views/layout/header.php'
?>

<div class="container">
    <div class="row">
        <div class="col-md-12" align="center">

        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                   <li> - <?php echo $error; ?></li>
                <?php endforeach;?>
            </ul>
        <?php endif;?>
        <div>
            <h1>Registration Form</h1>

            <form action="#" method="post" autocomplete="off">
                <input type="text" name="name"><br>
                <input type="email" name="email"><br>
                <input type="password" name="password"><br>
                <input type="submit" name="submit" value="Register">
            </form>
        </div>
        </div>
    </div>
</div>

<?php
require_once ROOT . '/views/layout/footer.php'
?>
