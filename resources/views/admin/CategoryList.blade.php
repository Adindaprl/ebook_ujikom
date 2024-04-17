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
            <div class="recent--patients">
                <div class="title">
                    <h2 class="section--title">Category List</h2>
                    <a href="/addCategory"> 
                        <button class="add"><i class="ri-add-line"></i>Aad Category</button>
                    </a>
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <div>
                        </div>
                        <tbody>
                            @foreach ($category as $key => $cat)
                            <tr>
                                <div>
                                    
                                </div>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $cat['name'] }}</td>
                                <td>
                                    <form action="{{route('destroyCategory', $cat->id)}}" method="post">
                                        @csrf
                                        <button style="border:none">
                                            <span>
                                            <i class="ri-delete-bin-line delete"></i>
                                            </span>
                                        </button>
                                    </form>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>
</html>