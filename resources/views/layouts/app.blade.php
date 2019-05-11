<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Selamat Datang !</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet" href="{{ url('home/css/bootstrap.css') }}">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="{{ url('home/css/style.css') }}" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="{{ url('home/css/font-awesome.min.css') }}" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Aleo:300,300i,400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	 rel="stylesheet">
	<!-- //Web-Fonts -->
</head>

<body>
	<!-- home -->
	<div id="home">
		<!-- banner -->
		<div class="banner_w3lspvt" style="background: url({{ url('myBio/'.$myBio->photo_background) }}) no-repeat center;">
			<!-- nav -->
			<div class="nav_w3ls pt-4 pb-3 text-center">
				<nav>
					<label for="drop" class="toggle">Menu</label>
					<input type="checkbox" id="drop" />
					<ul class="menu">
						<!-- <li><a href="/" class="active">Home</a></li> -->
						<li><a href="#about" class="drop-text">About</a></li>
						<li><a href="#education">Education</a></li>
						<li><a href="#experiences">Experiences</a></li>
						<li><a href="#skills" class="drop-text">Skills</a></li>
						<li><a href="#portfolio" class="drop-text">Portfolio</a></li>
					</ul>
				</nav>
			</div>
			<!-- //nav -->
			<div class="banner-text text-right">
				<div class="banner-bot">
					<h1><a href="{{ url('/') }}" class="logo text-wh">{{ $myBio->name }}</a></h1>
					<p class="text-bl text-li mt-3 border-bottom pb-4">{!! $myBio->description !!}</p>
					<div class="social-icons mt-4">
						<ul class="list-unstyled">
							<li>
								<a href="{{ $myBio->fb }}">
									<span class="fa fa-facebook"></span>
								</a>
							</li>
							<li>
								<a href="{{ $myBio->twitter }}">
									<span class="fa fa-twitter"></span>
								</a>
							</li>
							<li>
								<a href="{{ $myBio->in }}">
									<span class="fa fa-linkedin"></span>
								</a>
							</li>
							<li>
								<a href="{{ $myBio->ig }}">
									<span class="fa fa-instagram"></span>
								</a>
							</li>
							<li>
								<a href="{{ $myBio->github }}">
									<span class="fa fa-github"></span>
								</a>
							</li>
						</ul>
					</div>
					<!-- <a href="contact.html" class="btn button-style">Hire Us</a> -->
				</div>
			</div>
		</div>
		<!-- //banner -->
	</div>
	<!-- //home -->

	<!-- about -->
	<section class="about py-5" id="about">
		<div class="container pt-xl-5 pt-lg-3">
			<div class="row about-grids">
				<div class="col-lg-5 about-left">
					<img src="{{ url('mybio/'.$myAbout->thumbnail) }}" alt="" class="img-fluid" />
				</div>
				<div class="col-lg-7 about-right mt-lg-0 mt-sm-5 mt-4">
					<h3 class="mb-3 text-bl let">Tentang Saya</h3>
					<p class="mb-3">{!! $myAbout->description !!}</p>
				</div>
			</div>
		</div>
	</section>
	<!-- //about -->

	<!-- places -->
	<section class="trav-grids py-5" id="education">
		<div class="container py-xl-5 py-lg-3">
			<div class="title-bg text-center py-5 mb-5" style="background: url({{ url('images/'.$parallax->background_parallax) }}) no-repeat center fixed;">
				<h3 class="tittle text-wh let mb-2 pt-lg-3">Education</h3>
				<p class="text-li mx-auto pb-lg-3">Riwayat pendidikan dari lahir hingga sekarang</p>
			</div>
			<div class="row">
				@foreach($myEducations as $myEducation)
				<div class="col-lg-6 mt-4">
					<div class="grids-tem-one">
						<div class="row">
							<div class="col-5 grids-img-left">
								<img src="{{ url('education/'.$myEducation->thumbnail) }}" alt="" class="img-fluid">
							</div>
							<div class="col-12 right-cont">
								<h4 class="mb-3 let tm-clr">{{ $myEducation->university }}</h4>
								<label>{{ $myEducation->study }}</label>
								<br>
								<label>tahun {{ $myEducation->from }} / {{ $myEducation->until }}</label>
								<p>{!! $myEducation->description !!}</p>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- //places -->

	<!-- places -->
	<section class="trav-grids py-5" id="experiences">
		<div class="container py-xl-5 py-lg-3">
			<div class="title-bg text-center py-5 mb-5" style="background: url({{ url('images/'.$parallax->background_parallax) }}) no-repeat center fixed;">
				<h3 class="tittle text-wh let mb-2 pt-lg-3">Experiences</h3>
				<p class="text-li mx-auto pb-lg-3">Pengalaman Pekerjaan</p>
			</div>
			<div class="row">
				@foreach($myExperiences as $experience)
				<div class="col-lg-6 mt-4">
					<div class="grids-tem-one">
						<div class="row">
							<div class="col-5 grids-img-left">
								<img src="{{ url('experience/'. $experience->thumbnail) }}" alt="" class="img-fluid">
							</div>
							<div class="col-7 right-cont">
								{{ $experience->from }} || {{ $experience->until }}
								<h4 class="mb-3 let tm-clr">{{ $experience->work_at }}</h4>
								<label>{{ $experience->name }}</label>
								<p>{!! $experience->detail !!}</p>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- //places -->

	<!-- what -->
	<div class="serives-w3pvt-mobi bg-li py-5" id="skills">
		<div class="container py-xl-5 py-lg-3">
			<div class="title-bg text-center py-5 mb-5" style="background: url({{ url('images/'.$parallax->background_parallax) }}) no-repeat center fixed;">
				<h3 class="tittle text-wh let mb-2 pt-sm-3">Skills</h3>
				<p class="text-li mx-auto pb-sm-3">Beberapa keahlian yang saya miliki</p>
			</div>
			<div class="row welcome-bottom pt-4">
				
				@foreach($mySkills as $skill)
				<div class="col-md-4 welcome-grid">
					<span class="{{ $skill->icon }}"></span>
					<h4 class="my-3">{{ $skill->name }}</h4>
					<p>{{ $skill->description }}</p>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- what -->

	<!-- blog -->
	<section class="news py-5" id="portfolio">
		<div class="container py-xl-5 py-lg-5">
			<div class="text-center mb-sm-5 mb-4">
				<h3 class="tittle text-bl let mb-2 pt-sm-3">Portfolio</h3>
			</div>
			<div class="row news-grids text-center">
				@foreach($portfolios as $portfolio)
				<div class="col-md-4 newsgrid">
					<a href="single.html">
						<img src="{{ url('portfolio/'.$portfolio->thumbnail) }}" alt="news image" class="img-fluid">
					</a>
					<h4 class="mt-5">{{ $portfolio->title }}</h4>
					<p class="my-4">{!! $portfolio->description !!}</p>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- //blog -->

	<!-- middle section -->
	<section class="w3ls-middle py-5 text-center" id="some">
		<div class="container py-xl-5 my-lg-5">
			<span class="w3-line text-uppercase mb-3">" {{ $myQuote->description }} "</span>
			<!-- <h3 class="w3pvt-web-title mb-4">Start Your Journey</h3>
			<p class="text-botm-mid">Donec consequat sapien ut leo cursus rhoncus. Nullam dui mi, vulputate ac metus at sed ut
				perspiciatis unde omnis iste natus error.</p>
			<a href="#about" class="btn button-style-2 mt-sm-5 mt-4">Read More</a> -->
		</div>
	</section>
	<!-- //middle section -->

	<!-- //footer -->
	<!-- footer social icons -->
	<div class="social-icons-footer text-center my-3">
		<ul class="list-unstyled">
			<li>
				<a href="{{ $myBio->fb }}">
					<span class="fa fa-facebook"></span>
				</a>
			</li>
			<li>
				<a href="{{ $myBio->twitter }}">
					<span class="fa fa-twitter"></span>
				</a>
			</li>
			<li>
				<a href="{{ $myBio->in }}">
					<span class="fa fa-linkedin"></span>
				</a>
			</li>
			<li>
				<a href="{{ $myBio->ig }}">
					<span class="fa fa-instagram"></span>
				</a>
			</li>
			<li>
				<a href="{{ $myBio->github }}">
					<span class="fa fa-github"></span>
				</a>
			</li>
		</ul>
	</div>
	<!-- //footer social icons -->
	<!-- copyright -->
	<div class="copy_right mb-5">
		<p class="text-center text-bl let">© 2019 Fajar Haikal
		</p>
	</div>
	<!-- //copyright -->

	<!-- move top icon -->
	<a href="#home" class="move-top text-center"></a>
	<!-- //move top icon -->


</body>

</html>