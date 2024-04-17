@extends('layout.sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
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
                    <form method="POST" action="{{route('createBook')}}" enctype="multipart/form-data">
                        @csrf
                        <h1>Create New Book</h1>
                        <div style="display:flex">
                        <input type="text" placeholder="Title" name="title"/>
                        <input type="text" placeholder="Writer" name="writer"/>
                        </div>
                        <div style="display:flex">
                        <input type="text" placeholder="publisher" name="publisher"/>
                        <input type="Date" placeholder="Tahun Terbit" name="year" />
                        </div>
                        <div style="display:flex">
                        <input type="file" placeholder="cover" name="image" />
                        <div class="col-6">
                            <label for="" class="form-label"
                              >Select Category</label>
                            <select class="form-select" aria-label="Default select example" name="category_id">
                              <option selected>Open this select menu</option>
                              @foreach($category as $item)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                              @endforeach
                          </select>
                          </div>
                        </div>
                        <button class="buttonFormUser" type="submit">Save</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </section>
</body>
</html>