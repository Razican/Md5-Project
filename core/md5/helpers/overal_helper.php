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
			'style'			=> '-moz-border-radius:5px 5px 5px 5px; background:none repeat scroll 0 0 #F9FFFF; margin: 10px; border:1px solid #CCDDDD; padding:4px 8px;'
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
			'src'			=> base_url().'styles/images/'.$LANG->lang().'/decrypt.png',
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
			'src'			=> base_url().'styles/images/'.$LANG->lang().'/encrypt.png',
			'alt'			=> lang('encryptor.action')
		);
		$string_submit = form_input($string_submit);

		return $string_submit;
	}
}

if ( ! function_exists('show_logo'))
{
	function show_logo()
	{
		global $LANG;

		$show_logo = array(
			'src'			=> base_url().'styles/images/'.$LANG->lang().'/logo.png',
			'alt'			=> 'Logo'
		);
		$show_logo = img($show_logo);

		return $show_logo;
	}
}

if ( ! function_exists('fix_str'))
{
	function fix_str($string)
	{
		$var1		= array(
		"á", "Á",
		"é", "É",
		"í", "Í",
		"ó", "Ó",
		"ú", "Ú",
		"ñ", "Ñ"
		);
		$var2		= array(
		"&aacute;", "&Aacute;",
		"&eacute;", "&Eacute;",
		"&iacute;", "&Iacute;",
		"&oacute;", "&Oacute;",
		"&uacute;", "&Uacute;",
		"&ntilde;", "&Ntilde;"
		);

		$fixed_str	= str_replace($var1,$var2,$string);

		return $fixed_str;
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

/* End of file overal_helper.php */
/* Location: ./system/application/helpers/overal_helper.php */