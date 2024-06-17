<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(true);

/* 
Если нужно подключить скрипты и стили для конкрентного компонента
$this->addExternalCss("/local/templates/.default/css/swiper.min.css"); */
?>

<section class="vacancy-footer">
	<div class="container">
		<div class="row vacancy-footer-row">
			<div class="col-xl-6">
				<div class="vacancy-footer-img">
					<img src="<? echo $arResult["PREVIEW_PICTURE"]["SRC"] ?>" alt="<? echo $arResult["NAME"] ?>" />
				</div>
			</div>
			<div class="col-xl-6">
				<div class="vacancy-footer-block">
					<p class="title"><? echo ($arResult["NAME"]) ?></p>
					<?foreach($arResult["PROPERTY_ADD_ADVANT_VALUE"] as $advElem):?> 
					<p class="text"><? echo $advElem["SUB_VALUES"]["ADD_DESCRIPT"]["VALUE"];?></p>
					<?endforeach;?>
						<a class="btn btn-secondary btn-arrow-r" data-fancybox="" data-src="#modal-form-resume">
							<? echo $arResult["PROPERTY_ADD_BUTTON_NAME_VALUE"] ?>
							<span class="icon-arrow-r">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M8.25 19.5L15.75 12L8.25 4.5" stroke="white" stroke-width="1.5"></path>
								</svg>
							</span>
						</a>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal modal-success" id="modal-form-success" style="display: none">
			<div class="modal-success-icon">
				<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle cx="32" cy="32" r="31.5" stroke="#056CF2" />
					<path fill-rule="evenodd" clip-rule="evenodd"
						d="M46.691 22.3047C47.1044 22.7097 47.1028 23.3647 46.6874 23.7677L28.2088 41.6988C27.7949 42.1004 27.1259 42.1004 26.7119 41.6988L18.3126 33.5483C17.8972 33.1453 17.8956 32.4903 18.309 32.0853C18.7223 31.6803 19.3941 31.6788 19.8094 32.0818L27.4604 39.506L45.1906 22.3012C45.6059 21.8982 46.2777 21.8998 46.691 22.3047Z"
						fill="#056CF2" />
				</svg>
			</div>
			<div class="modal-success-heading h2">
				Спасибо!
			</div>
			<div class="modal-success-description h3">
				Ваше сообщение успешно отправлено
			</div>
		</div>

        <div class="modal" id="modal-form-resume" style="display: none;">
			<div class="modal-heading h3">Отправить резюме</div>
			<form class="form form--modal" action="#" method="GET">
				<div class="form-grid">
					<div class="form-line form-line--auto">
						<div class="input-field">
							<label for="modal-text-1">
								Имя*
							</label>
							<input id="modal-text-1" name="FIO" type="text" value="" placeholder="ФИО" required />
							<div class="input-field-error">
								Обязательно к заполнению
							</div>
						</div>
					</div>
					<div class="form-line form-line--auto">
						<div class="input-field">
							<label for="modal-email-1">
								e-mail*
							</label>
							<input id="modal-email-1" name="EMAIL" type="email" value="" placeholder="e-mail"
								required />
							<div class="input-field-error">
								Обязательно к заполнению
							</div>
						</div>
					</div>
					<div class="form-line">
						<div class="textarea-field">
							<label for="modal-textarea-1">
								Сообщение*
							</label>
							<textarea id="modal-textarea-1" name="MESSAGE" placeholder="Введите Ваше сообщение"
								required></textarea>
							<div class="textarea-field-error">
								Обязательно к заполнению
							</div>
						</div>
					</div>
					<div class="form-line">
						<div class="file-upload">
							<input type="file">
							<div class="file-upload-text">
								<p>Прикрепить резюме</p>
								<div class="icon">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M18.2659 11.8995L11.5484 18.617C9.79105 20.3744 6.94181 20.3744 5.18445 18.617V18.617C3.42709 16.8596 3.42709 14.0104 5.18445 12.253L5.36123 12.0763L8.00244 9.5M14.0233 7.65685L7.20476 14.4754C6.61897 15.0612 6.61897 16.0109 7.20476 16.5967V16.5967C7.79054 17.1825 8.74029 17.1825 9.32608 16.5967L17.5588 8.36396C18.7304 7.19239 18.7304 5.29289 17.5588 4.12132V4.12132C16.3872 2.94975 14.4878 2.94975 13.3162 4.12132L12.0787 5.35876L10.3994 7.03814" stroke="#6C7498" stroke-width="1.5" stroke-linecap="round"/>
										</svg>
										
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-footer">
					<div class="form-footer-row">
						<div class="checkbox form-footer-message">
							<input id="modal-agreements" type="checkbox" required checked name="AGREEMENTS" value="" />
							<label for="modal-agreements">
								Я принимаю <a href="#">пользовательское соглашение</a> и условия
								<a href="#">обработки персональных данных</a>
							</label>
						</div>
						<div class="form-footer-button">
							<button class="btn btn-primary" type="submit">отправить</button>
						</div>
					</div>
				</div>
			</form>
		</div>

<?// echo "<pre>"; print_r($arResult); echo "</pre>"; ?>