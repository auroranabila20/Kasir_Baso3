<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>POS APP | BASO AMMAR </title>

<link rel="stylesheet"
 href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">

<link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

<style>
*{
  font-family: 'Poppins', sans-serif;
  box-sizing: border-box;
}

body{
  margin:0;
}

/* ===== BACKGROUND ===== */
.login-wrapper{
  min-height:100vh;
  width:100%;
  display:flex;
  align-items:center;
  justify-content:center;
  background:url("/images/baso_desktop.jpeg") center/cover no-repeat;
  position:relative;
}

.login-wrapper::before{
  content:"";
  position:absolute;
  inset:0;
  background:rgba(0,0,0,.55);
  z-index:0;
}

/* ===== CARD ===== */
.login-card{
  position:relative;
  z-index:1;
  width:clamp(300px, 90vw, 380px);
  padding:32px;
  border-radius:22px;
  background:rgba(255,255,255,.15);
  backdrop-filter:blur(20px);
  color:#fff;
}

.login-avatar{
  width:70px;
  height:70px;
  margin:0 auto 12px;
  border-radius:50%;
  background:rgba(255,255,255,.25);
  display:flex;
  align-items:center;
  justify-content:center;
}

.login-avatar i{
  font-size:26px;
}

.login-title{
  text-align:center;
  font-weight:600;
  font-size:22px;
  margin-bottom:22px;
}

.form-group{
  margin-bottom:14px;
}

.input-box{
  position:relative;
}

.input-box input{
  width:100%;
  height:46px;
  padding:0 44px 0 14px;
  border-radius:12px;
  border:none;
  background:rgba(255,255,255,.25);
  color:#fff;
  font-size:15px;
}

.input-box input::placeholder{
  color:rgba(255,255,255,.75);
}

.input-box i{
  position:absolute;
  right:14px;
  top:50%;
  transform:translateY(-50%);
  opacity:.8;
}

.remember{
  display:flex;
  align-items:center;
  font-size:14px;
  margin:12px 0 20px;
}

.btn-login{
  width:100%;
  height:48px;
  border:none;
  border-radius:14px;
  background:#fff;
  color:#000;
  font-weight:600;
  cursor:pointer;
  transition:.25s;
  margin-top:4px;
}

.btn-google{
  margin-top:14px;
  width:100%;
  height:48px;
  border-radius:14px;
  background:#db4437;
  color:#fff;
  border:none;
  font-weight:500;
}

/* ===============================================
   =====     MOBILE MODE (≤ 480px) ONLY     ======
   =============================================== */
@media(max-width:480px){

  .login-wrapper{
      background:url("/images/baso_mobile.jpeg") center/cover no-repeat;
  }

  .login-card{
    width:92%;
    padding:22px 20px;
    border-radius:16px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(16px);
  }

  .login-avatar{
    width:60px;
    height:60px;
    margin-bottom:10px;
  }

  .login-avatar i{
    font-size:22px;
  }

  .login-title{
    font-size:18px;
    margin-bottom:18px;
  }

  .input-box input{
    height:42px;
    font-size:14px;
  }

  .btn-login,
  .btn-google{
    height:44px;
    font-size:14px;
    border-radius:12px;
  }
}
</style>
</head>

<body>

<div class="login-wrapper">
  <div class="login-card">

    <div class="login-avatar">
      <i class="fas fa-user"></i>
    </div>

    <div class="login-title">KASIR BAKSO AMMAR</div>

    @if ($errors->any())
        <div style="
            background: rgba(255, 0, 0, .25);
            padding: 10px 14px;
            border-radius: 10px;
            margin-bottom: 16px;
            font-size: 13px;
            color: #fff;
        ">
            <ul style="padding-left: 18px; margin:0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="form-group">
        <div class="input-box">
          <input type="email" name="email" placeholder="Email" required>
          <i class="fas fa-envelope"></i>
        </div>
      </div>

      <div class="form-group">
        <div class="input-box">
          <input type="password" name="password" placeholder="Password" required>
          <i class="fas fa-lock"></i>
        </div>
      </div>


      <button class="btn-login">LOGIN</button>
    </form>

    <button class="btn-google">
      <i class="fab fa-google"></i> Login dengan Google
    </button>

  </div>
</div>

</body>
</html>
