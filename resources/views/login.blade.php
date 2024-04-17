@extends('layout.login')

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="POST" action="{{route('register')}}">
      @csrf
			<h1>Create Account</h1>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" name="name"/>
      <input type="text" placeholder="Username" name="username"/>
			<input type="email" placeholder="Email" name="email"/>
			<input type="password" placeholder="Password" name="password" />
      <input type="text" placeholder="Address" name="address" />
			<button type="submit">Sign Up</button>
      </select>
		</form>
	</div>
	<div class="form-container sign-in-container">
			{{-- session start --}}
				@if (Session::get('notAllowed'))
				<div class="alert alert-danger w-100">
				{{ Session::get('notAllowed') }}
				</div>  
				@endif
			{{-- session end --}}
		<form action="/login/auth" method="POST">
			@csrf
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="teks" placeholder="username" name="username"/>
			<input type="password" placeholder="Password" name="password"/>
			{{-- <a href="#">Forgot your password?</a> --}}
			<button type="submit">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>