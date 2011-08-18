<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('paypal_input'))
{
	function paypal_input()
	{
		$paypal_input = array(
			'type'			=> 'image',
			'src'			=> lang('overal.paypal_image'),
			'border'		=> '0',
			'name'			=> 'submit',
			'alt'			=> lang('overal.paypal'),
			'id'			=> 'paypal-img'
		);
		$paypal_input = form_input($paypal_input);

		return $paypal_input;
	}
}

if ( ! function_exists('hash_input'))
{
	function hash_input()
	{
		$hash_input = array(
			'type'			=> 'text',
			'name'			=> 'hash',
			'size'			=> '32',
			'maxlength'		=> '32'
		);
		$hash_input = form_input($hash_input);

		return $hash_input;
	}
}

if ( ! function_exists('string_input'))
{
	function string_input()
	{
		$string_input = array(
			'type'			=> 'text',
			'name'			=> 'string',
			'size'			=> '32',
			'maxlength'		=> '50'
		);
		$string_input = form_input($string_input);

		return $string_input;
	}
}

if ( ! function_exists('hash_submit'))
{
	function hash_submit()
	{
		global $LANG;

		$hash_submit = array(
			'type'			=> 'image',
			'src'			=> skin_path() .'images/'.$LANG->lang().'/decrypt.png',
			'alt'			=> lang('decryptor.action')
		);
		$hash_submit = form_input($hash_submit);

		return $hash_submit;
	}
}

if ( ! function_exists('string_submit'))
{
	function string_submit()
	{
		global $LANG;

		$string_submit = array(
			'type'			=> 'image',
			'src'			=> skin_path() .'images/'.$LANG->lang().'/encrypt.png',
			'alt'			=> lang('encryptor.action')
		);
		$string_submit = form_input($string_submit);

		return $string_submit;
	}
}

if ( ! function_exists('skin_path'))
{
	function skin_path()
	{
		global $CFG;

		$skin_path	= base_url()."styles/skins/".$CFG->item('skin')."/";
		return $skin_path;
	}
}
if ( ! function_exists('copyright'))
{
	function copyright()
	{
		global $LANG;

		$link		= 'http://creativecommons.org/licenses/by-nc-nd/3.0/deed.'.$LANG->lang();
		$img		= array(
			'src'	=> 'http://i.creativecommons.org/l/by-nc-nd/3.0/80x15.png',
			'alt'	=> 'Creative Commons License'
		);

		$copy_img	= img($img);
		$copyright	= anchor($link, $copy_img);

		return $copyright;
	}
}


/* End of file overal_helper.php */
/* Location: ./application/helpers/overal_helper.php */