<?php require('header.php'); ?>
<?php require('menu.php'); ?>

<?php



    if(isset($_POST['submit'])) {
        $to = "kasim1411@gmail.com";
        $subject = $_POST['name'];
        $message = $_POST['message'];

        mail($to, $subject, $message);
        echo '<script>alert("Mesajınız iletildi, size en yakın zamanda ulaşacağız.")</script>';
		echo '<script>window.location="contact.php"</script>';
    }
?>

<div align="center" style="margin: 15px;">
<form method="post">
<table class="contact">
    <tr class="contact">
        <td class="contact" colspan="2"><h2>Bize ulaşmak isterseniz,  bir e-posta gönderin.<h2></td>
    </tr>

    <tr class="contact">
        <td class="contact"><b>İsim:</b></td>
        <td class="contact"><input type="text" name="name" required></td>
    </tr>

    <tr class="contact">
        <td class="contact"><b>Telefon:</b> </td>
        <td class="contact"><input type="text" maxlength="10" required></td>
    </tr>

    <tr class="contact">
        <td class="contact"><b>E-mail:</b> </td>
        <td class="contact"><input type="email" required></td>
    </tr>

    <tr class="contact">
        <td class="contact"><b>Mesaj</b> </td>
        <td class="contact"><textarea rows="10" cols="40" name="message" required></textarea>
    </tr>

    <tr class="contact">
        <td class="contact"></td>
        <td class="contact"><input type="submit" name="submit" class="btn btn-circle btn-raised ripple-effect btn-default"></td>
    </tr>
</table>
</form>
</div>

<?php require('footer.php') ?>
