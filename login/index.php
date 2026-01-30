<?php include '../header/header.php' ?>
<link rel="stylesheet" href="../css/login.css">

<div class="login-container">
    <h1>LOGIN</h1>
    
    <form method="post" action="login.php?accion=login">
        <div class="input-group">
            <label for="email">EMAIL</label>
            <input type="email" id="email" name="email" placeholder="your@email.com" required>
        </div>
        
        <div class="input-group">
            <label for="password">PASSWORD</label>
            <input type="password" id="password" name="password" placeholder="••••••••" required>
        </div>
        
        <button type="submit">SIGN IN</button>
    </form>
</div>