<? $lang = pll_current_language(); ?>

<footer id="footer" class="position-relative bg-light py-lg-7 mb-lg-0">
	<div class="cloud-overlay position-absolute overflow-x-hidden w-100">

	</div>
	<div class="container">
		<div class="row d-flex flex-wrap justify-content-between">
			<div class="col-lg-3 col-md-6">
				<div class="footer-menu">
					<h5 class="widget-title text-secondary"><?php echo $lang === 'ru' ? 'Быстрые ссылки' : 'Quick Links'; ?></h5>
					<ul class="menu-list list-unstyled">
						<?php
						$args = array(
							'menu' => 'bottom',
							'theme_location' => 'bottom',
							'container' => false,
							'items_wrap' => '%3$s'
						);
						wp_nav_menu($args);
						?>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-menu">
					<h5 class="widget-title text-secondary"><?php echo $lang === 'ru' ? 'Помощь' : 'Help'; ?></h5>
					<ul class="menu-list list-unstyled">
						<li class="menu-item pb-2">
							<a href="faqs.html" class="item-anchor"><?php echo $lang === 'ru' ? 'Часто задаваемые вопросы' : 'Faqs'; ?></a>
						</li>
						<li class="menu-item pb-2">
							<a href="#" class="item-anchor"><?php echo $lang === 'ru' ? 'Конфиденциальность' : 'Privacy'; ?></a>
						</li>
						<li class="menu-item pb-2">
							<a href="#" class="item-anchor"><?php echo $lang === 'ru' ? 'Условия' : 'Terms'; ?></a>
						</li>
						<li class="menu-item pb-2">
							<a href="#" class="item-anchor"><?php echo $lang === 'ru' ? 'Филиал' : 'Affiliate'; ?></a>
						</li>
						<li class="menu-item pb-2">
							<a href="#" class="item-anchor"><?php echo $lang === 'ru' ? 'Связаться' : 'Get in touch'; ?></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-menu">
					<h5 class="widget-title text-secondary"><?php echo $lang === 'ru' ? 'Социальные сети' : 'Social Media'; ?></h5>
					<div class="social-links">
						<ul class="list-unstyled">
							<li class="fw-medium pb-2">
								<a href="facebook.com">Facebook </a>
							</li>
							<li class="fw-medium pb-2">
								<a href="instagram.com">Instagram </a>
							</li>
							<li class="fw-medium pb-2">
								<a href="pinterest.com">Pinterest </a>
							</li>
							<li class="fw-medium pb-2">
								<a href="twitter.com">Twitter </a>
							</li>
							<li class="fw-medium pb-2">
								<a href="youtube.com">Youtube </a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-menu">
					<h5 class="widget-title text-secondary"><?php echo $lang === 'ru' ? 'Контакты' : 'Contact'; ?></h5>
					<h5 class="widget-title text-secondary"><?php echo $lang === 'ru' ? 'Название компании' : 'Company name'; ?></h5>
					<div class="social-links">
						<ul class="list-unstyled">
							<li class="fw-medium pb-2"><?php the_field('phone', 'option'); ?></li>
							<li class="fw-medium pb-2">
								<a href="mailto:yourinfo@gmail.com"><?php the_field('email', 'option'); ?></a>
							</li>
							<li class="fw-medium pb-2">
								<?php echo $lang === 'ru' ? 'Сонома, Монтерей, Сан-Луис-Обиспо, Санта-Барбара' : 'Sonoma, Monterey, San Luis Opispo, Santa Barbara'; ?>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<? $lan = pll_current_language(); ?>
<div class="modal-buy">
	<div class="modal__content">
		<div class="close">
			<div class="close__img">
				<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M4.94367 27.9954C4.70304 27.9954 4.46004 27.9034 4.27602 27.7194C3.90799 27.3514 3.90799 26.7546 4.27602 26.3842L26.3863 4.27612C26.7544 3.90812 27.3536 3.90812 27.7216 4.27612C28.0897 4.64412 28.0897 5.24093 27.7216 5.61129L5.60896 27.7218C5.42495 27.9058 5.18431 27.9978 4.94132 27.9978L4.94367 27.9954Z" fill="#DDDDDD" />
					<path d="M27.054 27.9952C26.8133 27.9952 26.5703 27.9032 26.3863 27.7192L4.27602 5.60872C3.90799 5.24073 3.90799 4.64391 4.27602 4.27356C4.64406 3.90556 5.24329 3.90556 5.61132 4.27356L27.724 26.384C28.092 26.752 28.092 27.3489 27.724 27.7192C27.54 27.9032 27.2993 27.9952 27.0563 27.9952H27.054Z" fill="#DDDDDD" />
				</svg>
			</div>
		</div>
		<h1 class="modal__title"><?php echo $lan === 'ru' ? 'Оформление заказа' : 'Feedback form'; ?></h1>
		<div class="form__pay_container">
			<form action="" class="form form-buy" method="post" id="form-pay">

				<input type="text" name="name" id="name" placeholder="<?php echo $lan === 'ru' ? 'Имя' : 'Name'; ?>" required />


				<input type="email" name="email" id="email" placeholder="<?php echo $lan === 'ru' ? 'Почта' : 'Email'; ?>" required />

				<input type="text" name="country" id="country" placeholder="<?php echo $lan === 'ru' ? 'Страна' : 'Country'; ?>" required />

				<input type="text" name="address" id="address" placeholder="<?php echo $lan === 'ru' ? 'Адрес' : 'Address'; ?>" required />
				<input type="hidden" name="title" value="<?php the_title(); ?>">
				<input id="price" type="hidden" name="price" class="input_price" value="">
				<input type="hidden" name="currency" value="<?php echo $lan === 'ru' ? 'KZT' : 'USD'; ?>">


				<button class="form__send"><?php echo $lan === 'ru' ? 'Оплатить' : 'Pay'; ?></button>

			</form>

			<div class="pay__product_info">
				<p class="pay__title"> <?php the_title(); ?></p>
				<?php echo $lan === 'ru' ? 'Цена' : 'Price'; ?>
				<span id="modal-price" class="pay__price"> </span> <?php echo $lan === 'ru' ? 'KZT' : 'USD'; ?>
			</div>
		</div>
		<div id="widget" class="buy-window"></div>
	</div>
</div>


<div class="footer-bottom py-3 bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-6 mb-3">
				<div class="d-flex flex-wrap align-items-center">
					<a href="/"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main-logo.png" alt="brand name" class="pe-5" /></a>
					<p class="m-0">©2023 Kiddo.<?php echo $lang === 'ru' ? 'Все права защищены' : 'All rights reserved'; ?> .</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 text-center mb-3">
				<p>
					<?php echo $lang === 'ru' ? 'Шаблон разработан' : 'Template designed by'; ?>
					<a href="https://templatesjungle.com" target="_blank" class="text-primary fw-bold">TemplatesJungle</a>
				</p>
			</div>
		</div>
	</div>
</div>


<?php wp_footer(); ?>

<script>
	let buy = document.querySelectorAll('.buy');
	let modalbuy = document.querySelector('.modal-buy');
	// console.log(window.price)
	// console.log("000000");
	buy.forEach(elem => {
		elem.addEventListener('click', () => {
			const modalPrice = document.getElementById('modal-price');
			modalPrice.innerHTML = window.price;
			console.log(window.price);
			modalbuy.style.display = "block"

		})
	})



	const form = document.querySelector('#form-pay');

	if (form) {


		form.addEventListener('submit', (e) => {
			e.preventDefault();
			const widget = document.querySelector('#widget');
			console.log(widget);

			const priceInput = form.querySelector('#price');
			priceInput.value = window.price;

			const act = '/wp-admin/admin-ajax.php';
			const xhr = new XMLHttpRequest();
			const formData = new FormData(form);

			formData.append("action", "send_order");
			xhr.onreadystatechange = function() {
				if (xhr.readyState === 4) {
					if (xhr.status === 200) {
						document.querySelector(".form__pay_container").classList.toggle("close1");
						document.querySelector(".buy-window").classList.toggle("open");
						let response = JSON.parse(xhr.responseText);
						if (response.error.code !== 0) {
							return;
						}
						PSP.Widget.init({
							display: {
								mode: "embedded",
								params: {
									container: widget,
									pcidss: "full",
								},
							},
							payUrl: response.object.payUrl,
						});
						return false;
					} else {
						console.log('An error occurred during your request: ' + xhr.status + ' ' + xhr.statusText);
					}
				}
			}
			xhr.open("POST", act);
			xhr.send(formData);
		});
	}
</script>

<script src="https://unpkg.com/imask"></script>

<script>
	const form1 = document.querySelector(".form");
	const phoneInput = form1.querySelector('input[name=tel]');

	const mask = IMask(phoneInput, {
		mask: '+{7}(000)000-00-00',
	});

	function submitForm(e) {
		var act = e.getAttribute("action");
		console.log(e);
		var request = new XMLHttpRequest();
		var formData = new FormData();
		for (let formItem of e) {
			formData.append(formItem.name, formItem.value);
		}
		request.open('POST', act, true);
		request.onreadystatechange = function() {
			if (request.readyState === 4) {
				if (request.status === 422) {
					e.querySelector('.response').innerHTML = request.response;
					let inputs = e.querySelectorAll('input, select, textarea');
					inputs.forEach(el => {
						el.addEventListener('input', () => {
							el.removeAttribute("style");
							el.classList.remove('error');
						});
					});
					let errors = e.querySelector('.response').querySelectorAll("[data-error]");
					console.log(errors);
					errors.forEach(el => {
						let dataAt = el.getAttribute("data-error");
						let input = e.querySelector("input[name=" + dataAt + "], select[name=" + dataAt + "], textarea[name=" + dataAt + "]");
						input.style.borderColor = "#da4c4c";
						input.classList.add('error');
					});
				} else {
					e.querySelector('.response').innerHTML = request.response;
					e.reset();
				}
			}

		}
		request.send(formData);
		return false;
	}
</script>

</body>

</html>