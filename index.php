<?php
include "header.php";

session_start();

$name = isset($_SESSION["name"])?$_SESSION["name"]:'';
$email = isset($_SESSION["email"])?$_SESSION["email"]:'';

$isNameValid = true;

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $name = isset($_REQUEST["name"])?$_REQUEST["name"]:'';
    $email = isset($_REQUEST["email"])?$_REQUEST["email"]:'';

    $isNameValid = preg_match('/^[\D]{2,}$/', $name);
    $isEmailValid = preg_match('/^\w+@[a-z]+\.com$/i', $email);

    $isValid = $isNameValid && $isEmailValid;
    if ($isValid) {
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;

        header('Location: thanks.php', TRUE, 301);
    }
}
?>
<div class="container">
    <div class="row">
        <div class="column">
            <h1>Submit Form with a Validation</h1>
            <form action="index.php" method="post">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control <?= $isNameValid?'':'is-invalid' ?>" name="name" id="name" value="<?= $name ?>" placeholder="Enter your name">
                    <div class="invalid-feedback">
                        Please, enter name which contains at least 2 chars and no numbers
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control <?= $isEmailValid?'':'is-invalid' ?>" name="email" id="email" value="<?= $email ?>" placeholder="Enter your email">
                    <div class="invalid-feedback">
                        Please, enter email correctly
                    </div>
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>

            </form>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
