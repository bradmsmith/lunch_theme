<?php
/**
 * Elgg register form
 *
 * @package Elgg
 * @subpackage Core
 */

$password = $password2 = '';
$username = get_input('u');
$email = get_input('e');
$name = get_input('n');

if (elgg_is_sticky_form('register')) {
	extract(elgg_get_sticky_values('register'));
	elgg_clear_sticky_form('register');
}

?>
<div class="mtm">
	<?php
	echo elgg_view('input/text', array(
		'name' => 'name',
		'value' => $name,
		'class' => 'elgg-autofocus',
		'placeholder' => elgg_echo('name'),
	));
	?>
</div>
<div>
	<?php
	echo elgg_view('input/text', array(
		'name' => 'email',
		'value' => $email,
		'placeholder' => elgg_echo('email'),
	));
	?>
</div>
<div>
	<?php
	echo elgg_view('input/password', array(
		'name' => 'password',
		'value' => $password,
		'placeholder' => elgg_echo('password'),
	));
	?>
</div>
<div>
	<?php
	echo elgg_view('input/password', array(
		'name' => 'password2',
		'value' => $password2,
		'placeholder' => elgg_echo('passwordagain'),
	));
	?>
</div>

<?php
// view to extend to add more fields to the registration form
echo elgg_view('register/extend', $vars);

// Add captcha hook
echo elgg_view('input/captcha', $vars);

echo '<div class="elgg-foot">';
echo elgg_view('input/hidden', array('name' => 'username', 'value' => 'automatic'));
echo elgg_view('input/hidden', array('name' => 'friend_guid', 'value' => $vars['friend_guid']));
echo elgg_view('input/hidden', array('name' => 'invitecode', 'value' => $vars['invitecode']));
echo elgg_view('input/submit', array('name' => 'submit', 'value' => elgg_echo('register')));
echo '</div>';
