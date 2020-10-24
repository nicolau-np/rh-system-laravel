@extends('template')
@section('content')

<section class="body-sign">
	<div class="center-sign">
		<a href="/" class="logo pull-left">
			<img src="{{asset('assets/images/rh-system-logo.png')}}" height="54" alt="Porto Admin" />
		</a>

		<div class="panel panel-sign">
			<div class="panel-title-sign mt-xl text-right">
				<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Entrar</h2>
			</div>
			<div class="panel-body">
					{{Form::open(['class'=>'loginForm', 'name'=>'loginForm', 'method'=>'post', 'url'=>'/login'])}}
					{{csrf_field()}}
					@if(session('error'))
					<div class="alert alert-danger">{{session('error')}}</div>
					@endif

					@if(session('success'))
					<div class="alert alert-success">{{session('success')}}</div>
					@endif

					<div class="form-group mb-lg">
						<label>Email</label>
						<div class="input-group input-group-icon">
							<input name="email" type="text" class="form-control input-lg" />
							<span class="input-group-addon">
								<span class="icon icon-lg">
									<i class="fa fa-user"></i>
								</span>
							</span>
						</div>

						@if($errors->has('email'))
						<span class="text-danger">{{$errors->first('email')}}</span>
						@endif
					</div>

					<div class="form-group mb-lg">
						<div class="clearfix">
							<label class="pull-left">Palavra-Passe</label>
							<a href="#" class="pull-right">Esqueceu a Passe?</a>
						</div>
						<div class="input-group input-group-icon">
							<input name="password" type="password" class="form-control input-lg" />
							<span class="input-group-addon">
								<span class="icon icon-lg">
									<i class="fa fa-lock"></i>
								</span>
							</span>
						</div>

						@if($errors->has('password'))
						<span class="text-danger">{{$errors->first('password')}}</span>
						@endif
					</div>

					<div class="row">
						<div class="col-sm-8">
							<div class="checkbox-custom checkbox-default">
								<input id="RememberMe" name="rememberme" type="checkbox" />
								<label for="RememberMe">Lembrar-Me</label>
							</div>
						</div>
						<div class="col-sm-4 text-right">
							{{Form::submit('Entrar', ['class'=>'btn btn-primary hidden-xs'])}}
							{{Form::submit('Entrar', ['class'=>'btn btn-primary btn-block btn-lg visible-xs mt-lg'])}}

						</div>
					</div>

					<span class="mt-lg mb-lg line-thru text-center text-uppercase">
						<span>OU</span>
					</span>

					<div class="mb-xs text-center">
						<a class="btn btn-facebook mb-md ml-xs mr-xs">Conectar com <i class="fa fa-facebook"></i></a>
						<a class="btn btn-twitter mb-md ml-xs mr-xs">Conectar com <i class="fa fa-twitter"></i></a>
					</div>

					<p class="text-center">Não Tem uma Conta? <a href="pages-signup.html">Criar</a>

					{{Form::close()}}
			</div>
		</div>

		<p class="text-center text-muted mt-md mb-md">&copy; Copyright {{ date('Y') }}. All rights reserved. System by <a href="https://colorlib.com">Nicolau NP</a>.</p>
	</div>
</section>
@endsection