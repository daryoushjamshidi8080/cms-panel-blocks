@extends('layouts.auth')


@section('content')

		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeحالت = "light"; var thememode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { thememode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getitem("data-bs-theme") !== null ) { thememode = localStorage.getitem("data-bs-theme"); } else { thememode = defaultThemeحالت; } } if (thememode === "system") { thememode = window.matchMedia("(prefers-color-scheme: dark)").matches  "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", thememode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::احراز هویت - ورود -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
					<!--begin::form-->
					<div class="d-flex flex-center flex-column flex-lg-row-fluid">
						<!--begin::Wrapper-->
						<div class="w-lg-500px p-10">
							<!--begin::form-->
							<form class="form w-100" novalidate="novalidate"  method="Post" action="{{ route('login.post') }}">
                                @csrf
								<!--begin::Heading-->
								<div class="text-center mb-11">
									<!--begin::Title-->
									<h1 class="text-gray-900 fw-bolder mb-3">ورود</h1>
									<!--end::Title-->
									<!--begin::Subtitle-->
									<div class="text-gray-500 fw-semibold fs-6">شماr سوشیال کمپین ها</div>
									<!--end::Subtitle=-->
								</div>
								<!--begin::Heading-->
								<!--begin::Login options-->
								<!--end::Login options-->
								<!--begin::separator-->
								<div class="separator separator-content my-14">
									<span class="w-125px text-gray-500 fw-semibold fs-7"> ایمیل</span>
								</div>
								<!--end::separator-->
								<!--begin::Input group=-->
								<div class="fv-row mb-8">
									<!--begin::ایمیل-->
									<input type="text" placeholder="ایمیل" name="email" autocomplete="off" class="form-control bg-transparent" />
                                    <div> @error('email') {{$message}}@enderror</div>
									<!--end::ایمیل-->
								</div>
								<!--end::Input group=-->
								<div class="fv-row mb-3">
									<!--begin::password-->
									<input type="password" placeholder="کلمه عبور" name="password" autocomplete="off" class="form-control bg-transparent" />
                                    <div> @error('password') {{$message}}@enderror</div>
                                    @if (session()->has('error'))
                                        <div>{{ session('error') }}</div>

                                    @endif
                                    @if (session()->has('success'))
                                        <div> {{ session('success') }}</div>
                                    @endif
									<!--end::password-->
								</div>
								<!--end::Input group=-->
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
									<div></div>
									<!--begin::Link-->
									<a href="{{ route('forgetPasword') }}" class="link-primary">فراموشی رمز</a>
									<!--end::Link-->
								</div>
								<!--end::Wrapper-->
								<!--begin::ثبت button-->
								<div class="d-grid mb-10">
									<button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
										<!--begin::Indicatیا label-->
										<span class="indicator-label">ورود</span>
										<!--end::Indicatیا label-->
										<!--begin::Indicatیا progress-->
										<span class="indicator-progress">لطفا صبر کنید...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicatیا progress-->
									</button>
								</div>
								<!--end::ثبت button-->
								<!--begin::ثبت نام-->
								<div class="text-gray-500 text-center fw-semibold fs-6">آیا هنوز عضو نشده
								<a href="{{ route('register') }}" class="link-primary">ثبت نام</a></div>
								<!--end::ثبت نام-->
							</form>
							<!--end::form-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::form-->
					<!--begin::Footer-->
					<div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
						<!--begin::زبانs-->
						<div class="me-10">
							<!--begin::Toggle-->

							<!--end::Toggle-->
							<!--begin::Menu-->
							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7" data-kt-menu="true" id="kt_auth_lang_menu">
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link d-flex px-5" data-kt-lang="انگلیسی">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="{{ asset('assets/auth/media/flags/united-states.svg') }}" alt="" />
										</span>
										<span data-kt-element="lang-name">انگلیسی</span>
									</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link d-flex px-5" data-kt-lang="اسپانیایی">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="{{ asset('assets/auth/media/flags/spain.svg') }}" alt="" />
										</span>
										<span data-kt-element="lang-name">اسپانیایی</span>
									</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link d-flex px-5" data-kt-lang="آلمانی">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="{{ asset('assets/auth/media/flags/germany.svg') }}" alt="" />
										</span>
										<span data-kt-element="lang-name">آلمانی</span>
									</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link d-flex px-5" data-kt-lang="ژاپنی">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="{{ asset('assets/auth/media/flags/japan.svg') }}" alt="" />
										</span>
										<span data-kt-element="lang-name">ژاپنی</span>
									</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link d-flex px-5" data-kt-lang="فرانسه">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="{{ asset('assets/auth/media/flags/france.svg') }}" alt="" />
										</span>
										<span data-kt-element="lang-name">فرانسه</span>
									</a>
								</div>
								<!--end::Menu item-->
							</div>
							<!--end::Menu-->
						</div>
						<!--end::زبانs-->
						<!--begin::Links-->
						<!--end::Links-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Body-->
				<!--begin::کناری-->
				<div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url({{ asset('assets/auth/media/misc/auth-bg.png') }}">
					<!--begin::Content-->
					<div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
						<!--begin::Logo-->
						<a href="index.html" class="mb-0 mb-lg-12">
							<img alt="Logo" src="{{ asset('assets/auth/media/logos/custom-1.png') }}" class="h-60px h-lg-75px" />
						</a>
						<!--end::Logo-->
						<!--begin::Image-->
						<img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="{{ asset('assets/auth/media/misc/auth-screens.png') }}" alt="" />
						<!--end::Image-->
						<!--begin::Title-->
						<h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">سریع، کارآمد و محصولی</h1>
						<!--end::Title-->
						<!--begin::Text-->
						<div class="d-none d-lg-block text-white fs-base text-center">در این نوع پست،
						<a href="#" class="opacity-75-hover text-warning fw-bold me-1">وبلاگر</a>فردی را که با او مصاحبه کرده اند معرفی می کند
						<br />و اطلاعات پس زمینه ای در مورد آن ارائه می دهد
						<a href="#" class="opacity-75-hover text-warning fw-bold me-1">مصاحبه شونده</a>and their
						<br />ویاک زیر این مصاحبه متنی است.</div>
						<!--end::Text-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::کناری-->
			</div>
			<!--end::احراز هویت - ورود-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset('assets/auth/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/auth/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::سفارشی Javascript(used for this page only)-->
		<script src="{{ asset('assets/auth/js/custom/authentication/sign-in/general.js') }}"></script>
		<!--end::سفارشی Javascript-->
		<!--end::Javascript-->
@endsection
