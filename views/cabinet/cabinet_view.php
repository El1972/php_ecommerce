<?php
require_once ROOT . '/views/layout/header.php'
?>

<section>
    <div class="container">
        <div class="row">
            <h1>Hello <?php echo $user['name']; ?></h1>
                <ul>
                    <li>
                        <a href="/cabinet/edit">Edit Details</a>
                    </li>
                    <li>
                        <a href="/user/history">
                            List of Purchases
                        </a>
                    </li>
                </ul>
        </div>
    </div>
</section>

<?php
require_once ROOT . '/views/layout/footer.php'
?>