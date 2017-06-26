<?php

$multiFormName = 'signup-form';

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

$fullnameRequired = true;
$dobRequired      = false;

$mailingListRequired = false;

$sendEmail = true;

$email->setSubject( PM::get_option( 'site', 'name' ) );

$email->setFromEmail( PM::get_option( 'site', 'email' ) );
$email->setFromName( 'Signup from ' . PM::get_option( 'site', 'name' ) );

$email->addRecipient( PM::get_option( 'site', 'email' ) );

$addToDatabase = true;

$sendWelcomeMailer = false;

$group1 = false;
$group2 = false;
$group3 = false;
$group4 = false;
$group5 = false;

$listIDs[] = 2316;
//$listIDs[] = 0000;

$fh->addField( new FormFieldText( 'dob', $dobRequired ) );
$fh->addField( new FormFieldText( 'fullname', $fullnameRequired ) );

/* Leave this line as is */

require '/var/www/shared/formincludes/signupFormFooter.php';

?>

<div id="<?= $multiFormName; ?>-wrapper" data-success="<?= ($fh->showSuccessText) ? 'true' : 'false' ?>">

	<? if ( $fh->showSuccessText ): ?>

		<p class="successText">Thank you.<br/>We will be in touch soon.
		</p>

	<? endif; ?>

	<? if ( $fh->showForm ): ?>

		<? if ( $fh->showErrorText ): ?>

			<p class="errorText mb20"></p>

		<? else: ?>

			<p class="card__title text--charlie text--upper welcomeText mb20">Sign up for more information</p>

		<? endif; ?>

		<form action="" method="post" enctype="multipart/form-data" id="<?= $multiFormName; ?>" class="js-propform form  <?= $fh->showErrorText ? 'form--error' : '' ?>">

			<p class="js-propform-text"></p>

			<div class="form__field<?php if ( $fh->fields['fullname']->isError ) { ?> form__field--error<? } ?>">
				<input placeholder="Name" title="Name" type="text" name="forename" id="<?= $multiFormName ?>-fullname" value="<?php echo $fh->fields['fullname']->value ?>" <?= $fullnameRequired ? 'required aria-required="true"' : ''; ?> />
			</div>

			<div class="form__field<?php if ( $fh->fields['email']->isError ) { ?> form__field--error<? } ?>">
				<input placeholder="Email" title="Email Address" type="email" name="email" id="<?= $multiFormName ?>-email" value="<?php echo $fh->fields['email']->value ?>" <?= $emailRequired ? 'required aria-required="true"' : ''; ?> />
			</div>

			<div class="form__field<?php if ( $fh->fields['dob']->isError ) { ?> form__field--error<? } ?>">
				<input placeholder="DOB" title="Date of birth" type="text" name="dob" id="<?= $multiFormName ?>-dob" value="<?php echo $fh->fields['dob']->value ?>" <?= $dobRequired ? 'required aria-required="true"' : ''; ?> />
			</div>

			<div style="display:none !important;">
				<textarea name="textboxfilter" rows="" cols=""></textarea>
				<input type="hidden" name="multiFormName" value="<?= $multiFormName ?>"/>
			</div>

			<input type="submit" name="submitted" value="Subscribe" class="submit"/>

		</form>

	<? endif; ?>

</div>