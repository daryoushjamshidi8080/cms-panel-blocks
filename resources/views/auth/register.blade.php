@extends('layouts.auth')

@section('content')
    <!--begin::Theme mode setup on page load-->
		<script>var defaultThemeحالت = "light"; var thememode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { thememode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getitem("data-bs-theme") !== null ) { thememode = localStorage.getitem("data-bs-theme"); } else { thememode = defaultThemeحالت; } } if (thememode === "system") { thememode = window.matchMedia("(prefers-color-scheme: dark)").matches  "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", thememode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::احراز هویت - ثبت نام -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
					<!--begin::form-->
					<div class="d-flex flex-center flex-column flex-lg-row-fluid">
						<!--begin::Wrapper-->
						<div class="w-lg-500px p-10">

                            <div>
                                @if (session()->has('error'))
                                    <div>{{ session('error') }}</div>

                                @endif
                                @if (session()->has('success'))
                                    <div> {{ session('success') }}</div>
                                @endif

                            </div>
							<!--begin::form-->
							<form class="form w-100" novalidate="novalidate" id="kt_sign_up_form"  method="POST" action="{{ route('register.post') }}">
                                @csrf
								<!--begin::Heading-->
								<div class="text-center mb-11">
									<!--begin::Title-->
									<h1 class="text-gray-900 fw-bolder mb-3">ثبت نام</h1>
									<!--end::Title-->
									<!--begin::Subtitle-->
									<div class="text-gray-500 fw-semibold fs-6">شماr سوشیال کمپین ها</div>
									<!--end::Subtitle=-->
								</div>
								<!--begin::Heading-->
								<!--begin::Login options-->
								<!--end::Login options-->
								<!--begin::separator-->
								<!--end::separator-->
								<!--begin::Input group=-->
                                <div class="fv-row mb-8">
									<!--begin::اسم-->
									<input type="text" placeholder="اسم" name="name"  value="{{ old('name') }}"  autocomplete="off" class="form-control bg-transparent" />
                                    <div> @error('name') {{$message}}@enderror</div>
									<!--end::اسم-->
								</div>
								<div class="fv-row mb-8">
									<!--begin::ایمیل-->
									<input type="text" placeholder="ایمیل" name="email"  value="{{ old('email') }}" autocomplete="off" class="form-control bg-transparent" />
                                    <div> @error('email') {{$message}}@enderror</div>
									<!--end::ایمیل-->
								</div>
								<!--begin::Input group-->
								<div class="fv-row mb-8" data-kt-password-meter="true">
									<!--begin::Wrapper-->
									<div class="mb-1">
										<!--begin::Input wrapper-->
										<div class="position-relative mb-3">
											<input class="form-control bg-transparent" type="password" placeholder="کلمه عبور" name="password" autocomplete="off" />
                                            <div> @error('password') {{$message}}@enderror</div>
											<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
												<i class="ki-outline ki-eye-slash fs-2"></i>
												<i class="ki-outline ki-eye fs-2 d-none"></i>
											</span>
										</div>
										<!--end::Input wrapper-->
										<!--begin::Meter-->
										<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
										</div>
										<!--end::Meter-->
									</div>
									<!--end::Wrapper-->
									<!--begin::Hint-->
									<div class="text-muted">از 8 یا بیشتر کاراکتر با ترکیبی از حروف، اعداد و نمادها استفاده کنید.</div>
									<!--end::Hint-->
								</div>
								<!--end::Input group=-->
								<!--end::Input group=-->
								<div class="fv-row mb-8">
									<!--begin::تکرار رمز عبور-->
									<input placeholder="تکرار رمز عبور" name="password_confirmation" type="password" autocomplete="off" class="form-control bg-transparent" />
                                    <div> @error('password_confirmation') {{$message}}@enderror</div>
									<!--end::تکرار رمز عبور-->
								</div>
								<!--end::Input group=-->
								<!--begin::Accept-->
								<div class="fv-row mb-8">
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="toc" value="1" />
										<span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">من قبول میکنم
										<!-- <a href="#" class="ms-1 link-primary">تیم ها</a></span> -->
									</label>
								</div>
								<!--end::Accept-->
								<!--begin::ثبت button-->
								<div class="d-grid mb-10">
									<button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
										<!--begin::Indicatیا label-->
										<span class="indicator-label">ثبت نام</span>
										<!--end::Indicatیا label-->
										<!--begin::Indicatیا progress-->
										<span class="indicator-progress">لطفا صبر کنید...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicatیا progress-->
									</button>
								</div>
								<!--end::ثبت button-->
								<!--begin::ثبت نام-->
								<div class="text-gray-500 text-center fw-semibold fs-6">از قبل اکانت دارید
								<a href="{{ route('login') }}" class="link-primary fw-semibold">ورود</a></div>
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
						<!--end::زبانs-->
						<!--begin::Links-->

						<!--end::Links-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Body-->
				<!--begin::کناری-->
				<div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url({{ asset('assets/auth/media/misc/auth-bg.png') }})">
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
			<!--end::احراز هویت - ثبت نام-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/auth/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::سفارشی Javascript(used for this page only)-->
		<script src="{{ asset('assets/auth/js/custom/authentication/sign-up/general.js') }}"></script>
		<!--end::سفارشی Javascript-->
		<!--end::Javascript-->
@endsection
