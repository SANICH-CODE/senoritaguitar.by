
<div class="login">
  <h1>Login</h1>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <button type="submit" name="login" class="btn btn-primary btn-block btn-large" onclick="showBanner('.banner.loading')">Login.</button>
    </form>
<?php
    session_start();
    include('config.php');
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
        $query->bindParam(":username", $username, PDO::PARAM_STR);
        $query->bindParam(":password", $password, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        
        if (!$result) {
            echo '<script>document.addEventListener("DOMContentLoaded", function() {
                showBanner(".banner.error");
              });</script>';
            echo '<script>console.log("detected");</script>';
            
        } else {
            if($result['ban'] == 1){
                header("Location: /ban/");//перенаправление на страницу banned.php
                exit;
            }else {
            }
            $_SESSION['user_id'] = $result['id'];
            echo '<script>document.addEventListener("DOMContentLoaded", function() {
                showBanner(".banner.success");
              });</script>';
            header('Refresh: 1; URL=/cp/');
            
          }
        }
        
?>

</div>
</div>
<div class="banners-container">
  <div class="banners">
    <div class="banner error">
      <div class="banner-icon"><i data-eva="alert-circle-outline" data-eva-fill="#ffffff" data-eva-height="48" data-eva-width="48"></i></div>
      <div class="banner-message">Указаны неверные данные</div>
      <div class="banner-close" onclick="hideBanners()"><i data-eva="close-outline" data-eva-fill="#ffffff"></i></div>
    </div>
    <div class="banner loading">
      <div class="banner-icon"><i data-eva="loader-outline" data-eva-animation="pulse" data-eva-fill="#ffffff" data-eva-height="48" data-eva-width="48"></i></div>
      <div class="banner-message">Loading...</div>
    </div>
    <div class="banner success">
      <div class="banner-icon"><i data-eva="checkmark-circle-outline" data-eva-fill="#ffffff" data-eva-height="48" data-eva-width="48"></i></div>
      <div class="banner-message">Вы авторизировались! Переадресация...</div>
      <div class="banner-close" onclick="hideBanners()"><i data-eva="close-outline" data-eva-fill="#ffffff"></i></div>
    </div>
    <div class="banner console">
      <div class="banner-icon"><i data-eva="alert-circle-outline" data-eva-fill="#ffffff" data-eva-height="48" data-eva-width="48"></i></div>
      <div class="banner-message">Ваш ранг (console) не позволяет пройти авторизацию!</div>
      <div class="banner-close" onclick="hideBanners()"><i data-eva="close-outline" data-eva-fill="#ffffff"></i></div>
    </div>
  </div>
</div>
<script>
    const showBanner = (selector) => {
    hideBanners();
    // Ensure animation plays even if the same alert type is triggered.
    requestAnimationFrame(() => {
      const banner = document.querySelector(selector);
      banner.classList.add("visible");
    });
  };
  
  const hideBanners = (e) => {
    document
      .querySelectorAll(".banner.visible")
      .forEach((b) => b.classList.remove("visible"));
  };
</script>
<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans);
.btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
.btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
.btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
.btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
.btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
.btn-primary.active { color: rgba(255, 255, 255, 0.75); }
.btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
.btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
.btn-block { width: 100%; display:block; }

* { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

html { width: 100%; height:100%; overflow:hidden; }

.banners-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
}

.banner {
  color: white;
  font-weight: 700;
  padding: 2rem;
  display: flex;
  flex-direction: row;
  align-items: center;
}
.banner .banner-message {
  flex: 1;
  padding: 0 2rem;
}
.banner .banner-close {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0.5rem;
  border-radius: 4px;
  cursor: pointer;
  transition: background 0.3s;
}
.banner .banner-close:hover {
  background: rgba(0, 0, 0, 0.12);
}

.banner.success {
  background: #10c15c;
}
.banner.success::after {
  background: #10c15c;
}
.banner.error {
  background: #ed1c24;
}
.banner.error::after {
  background: #ed1c24;
}
.banner.console {
  background: #ed1c24;
}
.banner.console::after {
  background: #ed1c24;
}
.banner.info {
  background: #0b22e2;
}
.banner.info::after {
  background: #0b22e2;
}
.banner.loading {
  background: #0b22e2;
}
.banner.loading::after {
  background: #0b22e2;
}

.banner::after {
  content: "";
  position: absolute;
  height: 10%;
  width: 100%;
  bottom: 100%;
  left: 0;
}

.banner:not(.visible) {
  display: none;
  transform: translateY(-100%);
}

.banner.visible {
  box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.12);
  animation-name: banner-in;
  animation-direction: forwards;
  animation-duration: 0.6s;
  animation-timing-function: ease-in-out;
  animation-fill-mode: forwards;
  animation-iteration-count: 1;
}

@keyframes banner-in {
  0% {
    transform: translateY(-100%);
  }
  50% {
    transform: translateY(10%);
  }
  100% {
    transform: translateY(0);
  }
}
.show-banner {
  appearance: none;
  background: #ededed;
  border: 0;
  padding: 1rem 2rem;
  border-radius: 4px;
  cursor: pointer;
  text-transform: uppercase;
  margin: 0.25rem;
}

body { 
	width: 100%;
	height:100%;
	font-family: 'Open Sans', sans-serif;
	background: #092756;
	background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
}
.login { 
	position: absolute;
	top: 50%;
	left: 50%;
	margin: -150px 0 0 -150px;
	width:300px;
	height:300px;
}
.login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }

input { 
	width: 100%; 
	margin-bottom: 10px; 
	background: rgba(0,0,0,0.3);
	border: none;
	outline: none;
	padding: 10px;
	font-size: 13px;
	color: #fff;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
	border: 1px solid rgba(0,0,0,0.3);
	border-radius: 4px;
	box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
	-webkit-transition: box-shadow .5s ease;
	-moz-transition: box-shadow .5s ease;
	-o-transition: box-shadow .5s ease;
	-ms-transition: box-shadow .5s ease;
	transition: box-shadow .5s ease;
}
input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }

</style>