<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?= $this->session->flashdata('error'); ?>
    <?= validation_errors('<p style="color:red;">', '</p>'); ?>

    <form action="<?= base_url('auth/login') ?>" method="post">
        <input type="text" name="username" placeholder="Username" value="<?= set_value('username'); ?>" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
