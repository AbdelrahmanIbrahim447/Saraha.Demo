<?php

if (!function_exists('up')) {
	function up() {
		return new \App\Http\Controllers\Upload;
	}
}
if (!function_exists('setting')) {
	function setting() {
		return \App\User::orderBy('id', 'desc')->first();
	}
}
if (!function_exists('lang')) {
	function lang() {
		if (session()->has('lang')) {
			return session('lang');
		} else {
			session()->put('lang',setting()->main_lang);
			return setting()->main_lang;
		}
	}
}
if (!function_exists('direction')) {
	function direction() {
		if (session()->has('lang')) {
			if (session('lang') == 'ar') {
				return 'rtl';
			} else {
				return 'ltr';
			}
		} else {
			return 'ltr';
		}
	}
}

/////// Validate Helper Functions ///////
if (!function_exists('v_image')) {
	function v_image($ext = null) {
		if ($ext === null) {
			return 'image|mimes:jpg,jpeg,png,gif,bmp';
		} else {
			return 'image|mimes:'.$ext;
		}
	}
}
/////// Validate Helper Functions ///////
