<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(true);

/* 
Если нужно подключить скрипты и стили для конкрентного компонента
$this->addExternalCss("/local/templates/.default/css/swiper.min.css"); */
?>

<section class="main__contact container">
    <div class="main__contact-top">
        <div class="row">
            <div class="col-12 col-xl-2">
			<?if($arResult["PROPERTY_ZAG_SECTION1_VALUE"]):?>
                <div class="section-sub-heading"><? echo $arResult["PROPERTY_ZAG_SECTION1_VALUE"]; ?></div>
			<?endif;?>	
            </div>
            <div class="col-12 col-xl-6">

				<?if($arResult["PROPERTY_ADDRESS_VALUE"]):?>
                <p class="desc"><? echo $arResult["PROPERTY_ADDRESS_VALUE"]; ?></p>
                <?endif;?>

				<div class="main__contact-wrap">
                    <div class="main__contact-item">
                        <div class="row">
                            <div class="col-xl-8 col-md-6">
					<?
						$phone = $arResult["PROPERTY_PHONE_MAIN_VALUE"];
						$phone_rez = str_replace(array('(', ')', ' ', '-'), '', $phone);
						$phone_rez[0] = '+';
						$phone_rez[1] = '7';  
					?>
                                <a href="tel:<? echo $phone_rez; ?>" class="main__contact-item-link"><? echo $arResult["PROPERTY_PHONE_MAIN_VALUE"]; ?></a>
                                <p class="main__contact-item-desc"><? echo $arResult["PROPERTY_DESCR_PHONE_VALUE"]; ?></p>
                            </div>
                            <div class="col-lg-4 col-md-6"><button class="btn btn__content" data-fancybox data-src="#modal-form-feedback">Заказать звонок</button></div>
                        </div>
                    </div>
                    <div class="main__contact-item">
                        <div class="row">
                            <div class="col-xl-8">
					<?
						$phone2 = $arResult["PROPERTY_PHONE_VALUE"];
						$phone_rez2 = str_replace(array('(', ')', ' ', '-'), '', $phone2);
						$phone_rez2[0] = '+';
						$phone_rez2[1] = '7';  
					?>
                                <a href="tel:<? echo $phone_rez2; ?>" class="main__contact-item-link"><? echo $arResult["PROPERTY_PHONE_VALUE"]; ?></a>
                                <p class="main__contact-item-desc"><? echo $arResult["PROPERTY_DESCR_PHONE_ADD_VALUE"]; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="main__contact-item">
                        <div class="row">
                            <div class="col-xl-8">
                                <a href="mailto:<? echo $arResult["PROPERTY_EMAIL_VALUE"]; ?>" class="main__contact-item-link mail"><? echo $arResult["PROPERTY_EMAIL_VALUE"]; ?></a>
                                <p class="main__contact-item-desc"><? echo $arResult["PROPERTY_DESCR_EMAIL_VALUE"]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="main__contact-bottom">
        <div class="row main__contact-bottom-row">
            <div class="col-12 col-xl-2">
			<?if($arResult["PROPERTY_ZAG_SECTION2_VALUE"]):?>
                <div class="section-sub-heading"><? echo $arResult["PROPERTY_ZAG_SECTION2_VALUE"]; ?></div>
			<?endif;?>
            </div>
            <div class="col-12 col-xl-6">
                <div class="main__contact-wrap">
                    <div class="main__contact-item">
                        <div class="row">
                            <div class="col-xl-8 col-12">
					<?
						$phone3 = $arResult["PROPERTY_PHONE_PRESS_VALUE"];
						$phone_rez3 = str_replace(array('(', ')', ' ', '-'), '', $phone3);
						$phone_rez3[0] = '+';
						$phone_rez3[1] = '7';  
					?>
                                <a href="tel:<? echo $phone_rez3; ?>" class="main__contact-item-link"><? echo $arResult["PROPERTY_PHONE_PRESS_VALUE"]; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-2"></div>
            <div class="col-12 col-xl-6">
                <div class="main__contact-wrap main__contact-wrap-bottom">
                    <div class="main__contact-item">
                        <div class="main__contact-wrap-bottom-row">
                            <a href="mailto:<? echo $arResult["PROPERTY_EMAIL_PRESS_VALUE"]; ?>" class="main__contact-item-link mail"><? echo $arResult["PROPERTY_EMAIL_PRESS_VALUE"]; ?></a>
                            
                            <div class="socials-wrap">
                                    <a href="#" class="socials-item">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_2507_8361)">
                                                <path d="M0 24L1.69627 17.8403C0.647564 16.0323 0.0974211 13.9848 0.103152 11.8916C0.103152 5.3327 5.46704 0 12.0516 0C15.2493 0 18.2521 1.23764 20.5043 3.48479C22.7622 5.73194 24.0057 8.72053 24 11.8973C24 18.4563 18.6361 23.789 12.0458 23.789H12.0401C10.0401 23.789 8.07449 23.2871 6.32664 22.3403L0 24ZM6.63037 20.1901L6.9914 20.4068C8.51575 21.308 10.2636 21.7814 12.0458 21.7871H12.0516C17.5243 21.7871 21.9828 17.3555 21.9828 11.903C21.9828 9.26236 20.9513 6.78137 19.0773 4.91065C17.2034 3.03992 14.7049 2.01331 12.0516 2.01331C6.57879 2.0076 2.12034 6.43916 2.12034 11.8916C2.12034 13.7567 2.64183 15.576 3.63897 17.1502L3.87392 17.5266L2.87106 21.1711L6.63037 20.1901Z" fill="#056CF2" />
                                                <path class="wa-bg" d="M0.421875 23.5836L2.06084 17.635C1.04652 15.8954 0.513565 13.9163 0.513565 11.8973C0.519296 5.56651 5.69408 0.416321 12.0551 0.416321C15.1439 0.416321 18.0379 1.61404 20.2156 3.78134C22.3932 5.94864 23.5909 8.83457 23.5909 11.903C23.5909 18.2338 18.4104 23.384 12.0551 23.384H12.0494C10.1181 23.384 8.2213 22.8992 6.53648 21.9867L0.421875 23.5836Z" fill="" />
                                                <path d="M0 24L1.69627 17.8403C0.647564 16.0323 0.0974211 13.9848 0.103152 11.8916C0.103152 5.3327 5.46704 0 12.0516 0C15.2493 0 18.2521 1.23764 20.5043 3.48479C22.7622 5.73194 24.0057 8.72053 24 11.8973C24 18.4563 18.6361 23.789 12.0458 23.789H12.0401C10.0401 23.789 8.07449 23.2871 6.32664 22.3403L0 24ZM6.63037 20.1901L6.9914 20.4068C8.51575 21.308 10.2636 21.7814 12.0458 21.7871H12.0516C17.5243 21.7871 21.9828 17.3555 21.9828 11.903C21.9828 9.26236 20.9513 6.78137 19.0773 4.91065C17.2034 3.03992 14.7049 2.01331 12.0516 2.01331C6.57879 2.0076 2.12034 6.43916 2.12034 11.8916C2.12034 13.7567 2.64183 15.576 3.63897 17.1502L3.87392 17.5266L2.87106 21.1711L6.63037 20.1901Z" fill="#056CF2" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.06747 6.91824C8.84397 6.42205 8.60901 6.41064 8.39698 6.40493C8.22506 6.39923 8.02449 6.39923 7.82391 6.39923C7.62334 6.39923 7.30243 6.47338 7.02735 6.76995C6.75228 7.06653 5.98438 7.78516 5.98438 9.25094C5.98438 10.711 7.05601 12.1255 7.205 12.3251C7.354 12.5247 9.27377 15.6217 12.3053 16.8137C14.8268 17.8061 15.3425 17.6065 15.8869 17.5551C16.4314 17.5038 17.652 16.8365 17.9041 16.1407C18.1506 15.4449 18.1506 14.8517 18.0761 14.7262C18.0016 14.6008 17.801 14.5266 17.503 14.3783C17.205 14.23 15.7379 13.5114 15.4629 13.4087C15.1878 13.3118 14.9872 13.2604 14.7924 13.557C14.5918 13.8536 14.0188 14.5209 13.8468 14.7205C13.6749 14.9201 13.4973 14.943 13.1993 14.7947C12.9013 14.6464 11.9385 14.3327 10.7981 13.3175C9.90987 12.5304 9.30815 11.5551 9.13623 11.2585C8.96431 10.962 9.11904 10.8023 9.26804 10.654C9.39984 10.5228 9.56603 10.3061 9.71503 10.135C9.86403 9.96387 9.9156 9.8384 10.013 9.63878C10.1104 9.43916 10.0646 9.26805 9.9901 9.11976C9.9156 8.97718 9.33108 7.5057 9.06747 6.91824Z" fill="#056CF2" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2507_8361">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>   
                                    </a>
                                    <a href="#" class="socials-item">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.03348 11.2933C8.23497 8.59137 12.3703 6.81013 14.4394 5.94952C20.3471 3.4923 21.5746 3.06545 22.3748 3.05136C22.5507 3.04826 22.9442 3.09187 23.1991 3.29868C23.4143 3.47331 23.4735 3.70921 23.5019 3.87478C23.5302 4.04035 23.5655 4.41752 23.5374 4.71222C23.2173 8.07597 21.832 16.2389 21.1273 20.0063C20.8291 21.6005 20.2419 22.135 19.6735 22.1873C18.4381 22.301 17.5001 21.3709 16.3036 20.5866C14.4313 19.3593 13.3735 18.5953 11.5562 17.3976C9.45585 16.0136 10.8174 15.2529 12.0143 14.0097C12.3276 13.6843 17.7706 8.73347 17.876 8.28435C17.8891 8.22818 17.9014 8.01881 17.777 7.90825C17.6526 7.79769 17.469 7.8355 17.3365 7.86557C17.1487 7.90819 14.1577 9.88513 8.3635 13.7964C7.51451 14.3794 6.74552 14.6634 6.05653 14.6485C5.29698 14.6321 3.83591 14.2191 2.74975 13.866C1.41753 13.433 0.35871 13.204 0.450909 12.4686C0.498932 12.0855 1.02646 11.6937 2.03348 11.2933Z" fill="#056CF2"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="socials-item">
                                        <svg width="24" height="14" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.76508 9.75994V0H13.6037V5.40551C16.6746 5.04514 18.6153 1.65168 19.2017 0H23.2003C22.7205 3.45352 19.5483 6.10622 17.9222 6.90703C20.6412 7.73288 24 11.7119 24 13.9642H19.8415C18.306 10.1203 15.0432 8.95913 13.6037 8.85902V13.9642C4.56694 14.5648 -0.231344 7.50765 0.00857982 0H4.00714C4.24707 7.05719 8.08569 9.15933 9.76508 9.75994Z" fill="#056CF2"/>
                                        </svg>                                                          
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact__map container">
    <div id="map" style="width: 100%; height: 700px;"></div>
</section>

<section class="contact__invoice container">
    <div class="row">
        <div class="col-xl-2 col-md-12">
            <div class="section-sub-heading"><? echo $arResult["PROPERTY_ZAG_SECTION3_VALUE"]; ?></div>
        </div>
        <div class="col-xl-5 col-md-6">
            <div class="invoice__wrap invoice__wrap-1">       
			<?foreach($arResult["PROPERTY_REKVIZIT1_VALUE"] as $rekv1):?> 
				<div class="invoice__item">
                    <p class="subtitle"><? echo $rekv1["SUB_VALUES"]["ZAG_REKVIZIT1"]["VALUE"];?></p>
                    <p class="title"><? echo $rekv1["SUB_VALUES"]["PODZAG_REKVIZIT1"]["VALUE"];?></p>
                </div>
			<?endforeach;?>	
            </div>
        </div>
        <div class="col-xl-5 col-md-6">
            <div class="invoice__wrap invoice__wrap-2">
			<?foreach($arResult["PROPERTY_REKVIZIT2_VALUE"] as $rekv2):?>
                <div class="invoice__item">
					<p class="subtitle"><? echo $rekv2["SUB_VALUES"]["ZAG_REKVIZIT2"]["VALUE"];?></p>
                    <p class="title"><? echo $rekv2["SUB_VALUES"]["PODZAG_REKVIZIT2"]["VALUE"];?></p>
                </div>
			<?endforeach;?>
            </div>
        </div>
        <?if($arResult["PROPERTY_DOWNLOAD_FILE_NAME_VALUE"]):?>
		<div class="row justify-content-end">
            <div class="col-xl-10">
                <div class="contact__invoice-download">
                    <div class="download-block">
                    <div class="download-block">
                        <a href="<? echo CFile::GetPath($arResult["PROPERTY_DOWNLOAD_FILE_VALUE"]);?>" class="btn round-btn download-btn">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 8L6 8C3.79086 8 2 9.79086 2 12L2 17C2 19.2091 3.79086 21 6 21L18 21C20.2091 21 22 19.2091 22 17L22 12C22 9.79086 20.2091 8 18 8L16 8" stroke="#056CF2" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M9 13L11.2929 15.2929C11.6834 15.6834 12.3166 15.6834 12.7071 15.2929L15 13" stroke="#056CF2" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M12 15L12 3" stroke="#056CF2" stroke-width="1.5" stroke-linecap="round"/></svg>
                        </a>
            <a href="<? echo CFile::GetPath($arResult["PROPERTY_DOWNLOAD_FILE_VALUE"]);?>" class="download-title"><? echo $arResult["PROPERTY_DOWNLOAD_FILE_NAME_VALUE"]; ?></a>
                                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?endif;?>
    </div>
</section>

<?// echo "<pre>"; print_r($arItem); echo "</pre>"; ?>