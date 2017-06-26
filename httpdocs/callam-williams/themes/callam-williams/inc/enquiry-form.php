<?php

$multiFormName = 'membership-form';

require '/var/www/shared/formincludes/signupFormHeader.php';
$fh = $multiForms[ $multiFormName ];

$siteId = PM::get_option( 'site', 'id' );

$forenameRequired             = true;
$surnameRequired              = false;
$companyRequired              = false;
$dobRequired                  = true;
$dobYearRequired              = false;
$emailRequired                = false;
$phoneRequired                = false;
$addressRequired              = false;   // Set to 'postcode' (with quotes) to just make postcode required
$additionalInfoRequired       = false;
$cvRequired                   = false;
$commentsRequired             = false;
$reservationDateRequired      = false;
$reservationYearRequired      = false;
$reservationDepartureRequired = false;
$reservationTimeRequired      = false;
$reservationGuestsRequired    = false;

$genderRequired = true;
$dobRequired    = true;

$mailingListRequired = false;

$sendEmail = true;

$email->setSubject( PM::get_option( 'site', 'name' ) );

$email->setFromEmail( PM::get_option( 'site', 'email' ) );
$email->setFromName( 'Membership signup from ' . PM::get_option( 'site', 'name' ) );

$email->addRecipient( PM::get_option( 'site', 'email' ) );

$addToDatabase = false;

$sendWelcomeMailer = false;

$group1 = false;
$group2 = false;
$group3 = false;
$group4 = false;
$group5 = false;

//$listIDs[] = 0000;
//$listIDs[] = 0000;

$fh->addField( new FormFieldText( 'dob', $dobRequired ) );
$fh->addField( new FormFieldText( 'gender', $genderRequired ) );

/* Leave this line as is */

require '/var/www/shared/formincludes/signupFormFooter.php';

?>

<div id="<?= $multiFormName; ?>-wrapper" data-success="<?= ($fh->showSuccessText) ? 'true' : 'false' ?>">

	<? // Success Text  ?>
	<? if ( $fh->showSuccessText ): ?>

		<p class="successText">Thank you. We will be in touch soon.
		</p>

	<? endif; ?>

	<? // To be displayed at page load ?>
	<? if ( $fh->showForm ): ?>

		<? // To be displayed if the repsonse comes back with errors ?>
		<? if ( $fh->showErrorText ): ?>

			<p class="errorText card__title text--charlie text--upper welcomeText mb40">Please check the form and try again.</p>

		<? else: ?>

			<p class="welcomeText card__title text--charlie text--upper welcomeText mb40">Sign up to become a member</p>

		<? endif; ?>

		<form action="" method="post" enctype="multipart/form-data" id="<?= $multiFormName; ?>" class="js-propform form<?= $fh->showErrorText ? 'form--error' : '' ?>">

			<p class="js-propform-text"></p>

			<div class="form__field<?php if ( $fh->fields['forename']->isError ) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-forename">First Name</label>
				<input type="text" name="forename" id="<?= $multiFormName ?>-forename" value="<?php echo $fh->fields['forename']->value ?>" <?= $forenameRequired ? 'required aria-required="true"' : ''; ?> />
			</div>

			<div class="form__field<?php if ( $fh->fields['surname']->isError ) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-surname">Surname</label>
				<input type="text" name="surname" id="<?= $multiFormName ?>-surname" value="<?php echo $fh->fields['surname']->value ?>" <?= $surnameRequired ? 'required aria-required="true"' : ''; ?> />
			</div>

			<div class="form__field<?php if ( $fh->fields['gender']->isError ) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-gender">Gender</label>
				<input type="text" name="gender" id="<?= $multiFormName ?>-gender" value="<?php echo $fh->fields['gender']->value ?>" <?= $genderRequired ? 'required aria-required="true"' : ''; ?> />
			</div>

			<div class="form__field<?php if ( $fh->fields['dob']->isError ) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-dob">Date of birth</label>
				<input title="Date of birth" type="text" name="dob" id="<?= $multiFormName ?>-dob" value="<?php echo $fh->fields['dob']->value ?>" <?= $dobRequired ? 'required aria-required="true"' : ''; ?> />
			</div>

			<div class="form__field<?php if ( $fh->fields['address']->fields['address1']->isError ) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-address-address1">Address 1</label>
				<input type="text" name="address-address1" id="<?= $multiFormName ?>-address-address1" value="<?php echo $fh->fields['address']->fields['address1']->value ?>" <?= $addressRequired ? 'required aria-required="true"' : ''; ?> />
			</div>

			<div class="form__field<?php if ( $fh->fields['address']->fields['address2']->isError ) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-address-address1">Address 2</label>
				<input type="text" name="address-address2" id="<?= $multiFormName ?>-address-address2" value="<?php echo $fh->fields['address']->fields['address2']->value ?>"/>
			</div>

			<div class="form__field<?php if ( $fh->fields['address']->fields['town']->isError ) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-address-town">Town/City</label>
				<input type="text" name="address-town" id="<?= $multiFormName ?>-address-town" value="<?php echo $fh->fields['address']->fields['town']->value ?>" <?= $addressRequired ? 'required aria-required="true"' : ''; ?> />
			</div>

			<div class="form__field<?php if ( $fh->fields['address']->fields['postcode']->isError ) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-address-postcode">Postcode</label>
				<input type="text" name="address-postcode" id="<?= $multiFormName ?>-address-postcode" value="<?php echo $fh->fields['address']->fields['postcode']->value ?>" <?= $addressRequired ? 'required aria-required="true"' : ''; ?> />
			</div>

			<div class="form__field<?php if ( $fh->fields['address']->fields['country']->isError ) { ?>error<? } ?>">
				<label for="<?= $multiFormName ?>-address-country">Country</label>
				<input type="text" name="address-country" id="<?= $multiFormName ?>-address-country" value="<?php echo $fh->fields['address']->fields['country']->value ?>"/>
			</div>

			<div class="form__field<?php if ( $fh->fields['email']->isError ) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-email">E-Mail</label>
				<input type="email" name="email" id="<?= $multiFormName ?>-email" value="<?php echo $fh->fields['email']->value ?>" <?= $emailRequired ? 'required aria-required="true"' : ''; ?> />
			</div>

			<div class="form__field<?php if ( $fh->fields['phone']->isError ) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-phone">Phone</label>
				<input type="tel" name="phone" id="<?= $multiFormName ?>-phone" value="<?php echo $fh->fields['phone']->value ?>" <?= $phoneRequired ? 'required aria-required="true"' : ''; ?> />
			</div>


			<div style="display:none !important;">
				<textarea name="textboxfilter" rows="" cols=""></textarea>
				<input type="hidden" name="multiFormName" value="<?= $multiFormName ?>"/>
			</div>

			<input type="submit" name="submitted" value="Send" class="submit"/>

		</form>

	<? endif; ?>

</div>