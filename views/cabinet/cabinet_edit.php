<?php
require_once ROOT . '/views/layout/header.php'
?>

<div class="container">
    Edit
    <div class="row">
        <div class="col-md-12" align="center">

        <?php if ($result): ?>
            <p>Credentials are edited!</p>
        <?php else: ?>

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error ?></li>
                        <?php endforeach;?>
                    </ul>
                <?php endif;?>

                <form action="#" method="post">
                    <input type="text" name="name" value="<?php echo $name; ?>"><br>
                    <input type="email" name="email" value="<?php echo $email; ?>"><br>
                    <input type="password" name="password" value="<?php echo $password; ?>"><br>
                    <input type="submit" name="submit" value="Submit">
                </form>

        <?php endif;?>

        </div>
    </div>
</div>

<?php
require_once ROOT . '/views/layout/footer.php'
?>