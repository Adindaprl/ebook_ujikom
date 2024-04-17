@extends('layout.sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>
    <section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <h2>Med<span>Ex</span></h2>
        </div>
        <div class="search--notification--profile">
            <div class="search">
                <input type="text" placeholder="Search Scdule..">
                <button><i class="ri-search-2-line"></i></button>
            </div>
            <div class="notification--profile">
                <div class="picon lock">
                    <i class="ri-lock-line"></i>
                </div>
                <div class="picon bell">
                    <i class="ri-notification-2-line"></i>
                </div>
                <div class="picon chat">
                    <i class="ri-wechat-2-line"></i>
                </div>
                <div class="picon profile">
                    <img src="assets/images/profile.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="main">
        <div class="main--content">
            <div class="container" id="container">
                <div class="form-container sign-up-container">
                    <form method="POST" action="{{route('registerUser')}}">
                  @csrf
                        <h1>Create Account</h1>
                        <div style="display:flex">
                        <input type="text" placeholder="Name" name="name"/>
                        <input type="text" placeholder="Username" name="username"/>
                        </div>
                        <div style="display:flex">
                        <input type="email" placeholder="Email" name="email"/>
                        <input type="password" placeholder="Password" name="password" />
                        </div>
                        <div style="display:flex">
                        <input type="text" style="height:80px; border-radius:15px; width: 70%" placeholder="Address" name="address" />
                        <div>
                        <select class="role" name="role">
                            <option selected>Role</option>
                            <option value="Officer">Officer</option>
                            <option value="User">User</option>
                          </select>
                        </div>
                        </div>
                        <button class="buttonFormUser" type="submit">Submit</button>
                  </select>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </section>
</body>
</html>