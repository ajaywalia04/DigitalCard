/* ========== GENERAL ========== */

$(function () {
	/* CURRENT YEAR */
	var currentYear = new Date().getFullYear();
	$("#currentYear").html(currentYear);

	/* ADD OVERLAY */
	$(document.body).append('<div class="overlay" tabindex="-1"></div>');

	/* SIDE NAVIGATION */
	if ($(".nav-link").hasClass("active")) {
		$(".nav-link.active").attr("aria-current", "page");

		$(".nav-link.active").next(".collapse").show();
	}

	/* ADD ERROR TEXT WRAPPER */
	$(".form-input").after("<div></div>");

	/* PAGE LOADER */

	$(window).on("load", function () {
		setTimeout(function () {
			$(".loader-overlay").fadeOut("slow", function () {});
		}, 3000);
	});
});

/* FILE INPUT */

$(function () {
	var inputs = document.querySelectorAll(".file-input");

	for (var i = 0, len = inputs.length; i < len; i++) {
		customInput(inputs[i]);
	}

	function customInput(el) {
		const fileInput = el.querySelector('[type="file"]');
		const label = el.querySelector("[data-js-label]");

		fileInput.onchange = fileInput.onmouseout = function () {
			if (!fileInput.value) return;

			var value = fileInput.value.replace(/^.*[\\\/]/, "");
			el.className += " -chosen";
			label.innerText = value;
		};
	}
});

/* ========== DROPDOWN ========== */

$(function () {
	$('[data-toggle="dropdown"]').click(function (e) {
		$(this).siblings(".dropdown-menu").toggleClass("active");
		// Close one dropdown when selecting another
		$(".dropdown-menu").not($(this).siblings()).removeClass("active");
		e.stopPropagation();
	});

	$(document).click(function (e) {
		var $trigger = $(".dropdown-toggle");
		if ($trigger !== e.target && !$trigger.has(e.target).length) {
			$(".dropdown-menu").removeClass("active");
		}
	});
});

/* ========== DRAWER ========== */

$(function () {
	$('[data-toggle="drawer"]').click(function (e) {
		var id = $(this).attr("data-target");
		$(".drawer" + id).addClass("active");
		$("body").addClass("overflow-hidden");
		if (typeof $(".drawer" + id).attr("data-overlay") == "undefined") {
			$(".overlay").addClass("show");
		}
	});

	$('[data-dismiss="drawer"]').click(function (e) {
		$(this).parents(".drawer").removeClass("active");
		$(".overlay").removeClass("show");
		$("body").removeClass("overflow-hidden");
	});

	$(document).mouseup(function (e) {
		var $drawerArea = $(".drawer");
		if (!$drawerArea.is(e.target) && $drawerArea.has(e.target).length === 0) {
			if ($(".drawer").hasClass("active")) {
				$(".drawer").removeClass("active");
				$(".overlay").removeClass("show");
				$("body").removeClass("overflow-hidden");
			}
		}
	});
});

$(document).keyup(function (e) {
	if (e.keyCode === 27) {
		$(".drawer").removeClass("active");
		$(".overlay").removeClass("show");
		$("body").removeClass("overflow-hidden");
	}
});

/* ========== MODAL ========== */

$(function () {
	$('[data-toggle="modal"]').click(function (e) {
		var id = $(this).attr("data-target");
		$(".modal" + id).addClass("active");
		$(".modal" + id).attr("aria-hidden", "false");
		$(".overlay").addClass("show");
		$("body").addClass("overflow-hidden");
	});

	$('[data-dismiss="modal"]').click(function (e) {
		$(this).parents(".modal").removeClass("active");
		$(this).parents(".modal").attr("aria-hidden", "true");
		$(".overlay").removeClass("show");
		$("body").removeClass("overflow-hidden");
	});
});

$(document).keyup(function (e) {
	if (e.keyCode === 27) {
		$(".modal").removeClass("active");
		$(".modal").attr("aria-hidden", "true");
		$(".overlay").removeClass("show");
		$("body").removeClass("overflow-hidden");
	}
});

/* ========== COLLAPSE ========== */

$(function () {
	$('[data-toggle="collapse"]').click(function (e) {
		var id = $(this).attr("data-target");
		$(".collapse" + id).slideToggle(300);
	});
});

/* ========== ACCORDION ========== */

$(function () {
	$(".accordion-header").on("click", function () {
		if ($(this).hasClass("active")) {
			$(this).removeClass("active");
			$(this).siblings(".accordion-collapse").slideUp(300);
		} else {
			$(".accordion-header").removeClass("active");
			$(this).addClass("active");
			$(".accordion-collapse").slideUp(300);
			$(this).siblings(".accordion-collapse").slideDown(300);
		}
	});
});

/* ========== TABS ========== */

$(function () {
	$(".tabs").on("click", ".tab-link", function (e) {
		e.preventDefault();
		$(".tab-link").removeClass("active");
		$(".tab-pane").removeClass("show");
		$(this).addClass("active");
		$($(this).attr("data-target")).addClass("show").fadeIn();
	});
});

/* ========== NOTIFICATIONS ========== */

$(function () {
	$('[data-toggle="notification"]').click(function (e) {
		var id = $(this).attr("data-target");
		$(".notification" + id).addClass("active");
	});

	$('[data-dismiss="notification"]').click(function (e) {
		$(this).parents(".notification").removeClass("active");
	});

	function check_sticky() {
		if ($(".notification").hasClass("active")) {
			setTimeout(function () {
				$(".notification").removeClass("active", function () {});
			}, 2000);
		}
	}

	window.setInterval(check_sticky, 2000);
});

/* ========== ALERTS ========== */

$(function () {
	$('[data-dismiss="alert"]').click(function (e) {
		$(this).parents(".alert").fadeOut(150);
	});
});
