<?php

	$pattern="";
	$text="";
	$replaceText="";
	$replacedText="";

	$match="Not checked yet.";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$pattern=$_POST["pattern"];
	$text=$_POST["text"];
	$replaceText=$_POST["replaceText"];

	$replacedText=preg_replace($pattern, $replaceText, $text);

	$spacelessText = preg_replace("/\s/", '', $text);

	$nonnumericlessText = preg_replace("/[a-z]|[!@#$%^&*()\$\s]/i", '', $text);

	$newlineRemovedText = preg_replace('/[\r\n]+/', '', $text);

	$extractedText = preg_replace('/((.*|\n)\[)|(\](.*|\n))/i', '', $text);

	if(preg_match($pattern, $text)) {
						$match="Match!";
					} else {
						$match="Does not match!";
					}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Valid Form</title>
</head>
<body>
	<form action="regex_valid_form.php" method="post">
		<dl>
			<dt>Pattern</dt>
			<dd><input type="text" name="pattern" value="<?= $pattern ?>"></dd>

			<dt>Text</dt>
			<dd><textarea name="text"  cols="30" rows="10"></textarea></dd>

			<dt>Replace Text</dt>
			<dd><input type="text" name="replaceText" value="<?= $replaceText ?>"></dd>

			<dt>Output Text</dt>
			<dd><?=	$match ?></dd>

			<dt>Replaced Text</dt>
			<dd> <code><?=	$replacedText ?></code></dd>

            <dt>Space Removed Text</dt>
            <dd> <code><?=	$spacelessText ?></code></dd>

            <dt>Nonumeric Removed Text</dt>
            <dd> <code><?=	$nonnumericlessText ?></code></dd>

            <dt>Newline Removed Text</dt>
            <dd> <code><?=	$newlineRemovedText ?></code></dd>

            <dt>Text inside [] brackets</dt>
            <dd> <code><?=	$extractedText ?></code></dd>

			<dt>&nbsp;</dt>
			<dd><input type="submit" value="Check"></dd>
		</dl>

	</form>
</body>
</html>
