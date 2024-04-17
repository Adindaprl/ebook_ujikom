@extends('layout.sidebar')

{{-- <div class="cards">
    <tr>
     
        <div class="img--box--cover">
            <div class="img--box">
                <img src="{{url('assets/image/cover/'.$book->image)}}" alt="">
            </div>
        </div>        <div class="modal-footer" style="display: flex; padding-top:20px">
            <button type="sumbit" class="buttonBook">Collect</button>
            <button type="button" class="buttonBook">Read</button>
          </div>
    </tr>

</div> --}}

@extends('layout.sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> --}}
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
            <div class="doctors">
                <div class="title">
                    <h2 class="section--title">Book Detail</h2>
                </div>
                    <div class="doctors--cards" style="margin:20px">
                        <div class="doctor--card">
                            <a href="{{route('bookDetail', $book->id)}}">
                            <div class="img--box--cover">
                                <div class="img--box">
                                    <img src="{{url('assets/image/cover/'.$book->image)}}" alt="">
                                </div>
                            </div>
                            <td>{{$book->writer}}</td>
                            <td>{{$book->pubblisher}}</td>
                            <td>{{$book->year}}</td>
                            </a>
                            <form action="{{route('borrowBook')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="status">
                                <input type="hidden" name="borrow_date">

                                <div style="display: flex; padding-top:20px">
                                    <button type="sumbit" class="buttonBook">Borrow</button>
                                    {{-- <button type="button" class="buttonBook">Collect</button> --}}
                                  </div>
                            </form>
                        </div>
                    </div>
    

            </div>

        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
