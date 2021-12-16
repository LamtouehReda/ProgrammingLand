<!--  <form class="modal-content animate" action="/action_page.php">
        
    <div class="imgcontainer">
      <span onclick="func()" class="close" title="Close PopUp">&times;</span>
      <img src="images/users_images/1.png" alt="Avatar" class="avatar">
      <h1 style="text-align:center">Enjoy Us</h1>
    </div>

    <div class="container">
      <input type="text" class="login" placeholder="Enter Username" name="uname">
      <input type="password" class="login" placeholder="Enter Password" name="psw">        
      <button type="submit" class="login-btn">Login</button>
    </div>
    
  </form>-->
<form id="register-form" class="modal-content animate" method="POST" action="connection/register-check.php">
  <div class="log-left">
    <h1 class="h1-log">Sign up</h1>
    
    <input type="text" class="txt-input" id="username" name="username" placeholder="Username" required />
    <input type="text" class="txt-input" id='email' name="email" placeholder="E-mail" required />
    <input type="password" class="psw-input" id="password" name="password" placeholder="Password" required />
    <div id="message"></div>
    <button type="submit" class="log-submit" name="submit"  >Sign me up</button> 
  </div>
  
  <div class="log-right">
    <span class="loginwith">Sign in with<br />social network</span>
    
    <button class="social-signin facebook">Sign Up with facebook</button>
    <button class="social-signin twitter">Sign Up with Twitter</button>
    <button class="social-signin google">Sign Up with Google+</button>
    <div id="feedback" class="feedback">
      <a type="button" onclick="func()">
        Already have an account?
      </a>
    </div>

  </div>
  <div class="or">OR</div>
    
</form>
<form id="login-form" class="modal-content animate" method="POST" action="connection/login-check.php">
  <div class="log-left">
    <h1 class="h1-log">Login</h1>
    
    <input type="text" class="txt-input" id="username" name="username" placeholder="Username" required />
    <input type="password" class="psw-input" id="password" name="password" placeholder="Password" required />
    <div id="log-message"></div>
    <button type="submit" class="log-submit" name="submit"  >Login</button> 
  </div>
  
  <div class="log-right">
    <span class="loginwith">Login with with<br />social network</span>
    
    <button class="social-signin facebook">Login with facebook</button>
    <button class="social-signin twitter">Login with Twitter</button>
    <button class="social-signin google">Login with Google+</button>
    <div id="feedback" class="feedback">
      <a type="button" onclick="func()">
        Sign Up if you don't have an account?
      </a>
    </div>

  </div>
  <div class="or">OR</div>
    
</form>
