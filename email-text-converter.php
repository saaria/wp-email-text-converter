<?php
/*
  Plugin Name: E-mail Text Converter
  Plugin URI: https://github.com/saaria/wp-email-text-converter/
  Description: convert emaill text into script code in wordpress content
  Version: 1.0.0
  Author: YUKI
  Author URI: https://github.com/saaria/
  License: GPLv2
 */

$gbSetting = null;

add_action( 'admin_menu', 'add_plugin_setting' );

function add_plugin_setting() {
	add_options_page(
		'Setting | E-mail Text Converter',
		'E-mail Text Converter',
		'administrator',
		'emailtxt_setup_page',
		'emailtxt_setting_htmlpage'
	);
}

function emailtxt_setting_htmlpage() {
  global $gbSetting;
  
	$gbSetting = get_option( 'emailtxt_setting' );
	if( !$gbSetting ) {
		$gbSetting = array(
			'mailto_output_mode' => 0,
      'class_attribute' => '',
      'id_attribute' => '',
		);
		update_option( 'emailtxt_setting', $gbSetting );
	}
?>
	<div>
	<h2>E-mail Text Converter</h2>
	<form method="post" action="options.php">
<?php
    settings_fields( 'emailtxt_option_group' );
    do_settings_sections( 'emailtxt_setup_page' );
    submit_button();
?>
	</form>
	</div>
<?php
} 

add_action( 'admin_init', 'plugin_setting_init');

function plugin_setting_init() {
	register_setting(
		'emailtxt_option_group',
		'emailtxt_setting'
	);		

	add_settings_section(
		'setting_section_id',
		'Setting',
		'print_sction_info',
		'emailtxt_setup_page'
	);

	add_settings_field(
		'mailto_output_mode',
		'Hyper link of "mailto:":',
		'mailto_output_mode_callback',
		'emailtxt_setup_page',
		'setting_section_id'
  );

	add_settings_field(
		'class_attribute',
		'Class attribute (for hyper link):',
		'add_class_attribute_callback',
		'emailtxt_setup_page',
		'setting_section_id'
  );

  add_settings_field(
		'id_attribute',
		'ID attribute (for hyper link):',
		'add_id_attribute_callback',
		'emailtxt_setup_page',
		'setting_section_id'
  );

}

function print_sction_info() {
}

function mailto_output_mode_callback() {
	global $gbSetting;

	$mode_val = $gbSetting['mailto_output_mode'];
	$select_tbl = array(
		array( 'val'=>0, 'name'=>'none or delete' ),
		array( 'val'=>1, 'name'=>'add "mailto:"' ),
	);

	$html = "";
	foreach( $select_tbl as $r ) {
		$v = $r['val'];
		$n = $r['name'];
		if( $v == $mode_val ) {
			$checked = "selected";
		}
		else
		{
			$checked = "";
		}
		$html .= "<option value=\"$v\" $checked>$n</option>";
	}
  $html = "<select name=\"emailtxt_setting[mailto_output_mode]\">" . $html . "</select>";
  
	echo $html;
}

function add_class_attribute_callback() {
	global $gbSetting;

	$class_attribute_text = $gbSetting['class_attribute'];
?>
  <input type="text" name="emailtxt_setting[class_attribute]" value="<?php echo $class_attribute_text; ?>">
<?php
}

function add_id_attribute_callback() {
	global $gbSetting;

	$id_attribute_text = $gbSetting['id_attribute'];
?>
  <input type="text" name="emailtxt_setting[id_attribute]" value="<?php echo $id_attribute_text; ?>">
<?php
}

function create_ascii_characters($code, $rand){
  return strval( $code - $rand ).'+'.intval( $rand );
}

function convert_to_ascii( $str, $rand ){
  $result = '';
  for( $i = 0; $i < strlen( $str ); $i++ ) {
    if( $i > 0 )
      $result .= ',';
    switch ( $str[$i] ){
      case '-':
        $result .= create_ascii_characters( 45, $rand );
        break;
      case '.':
        $result .= create_ascii_characters( 46, $rand );
        break;
      case '0':
        $result .= create_ascii_characters( 48, $rand );
        break;  
      case '1':
        $result .= create_ascii_characters( 49, $rand );
        break;
      case '2':
        $result .= create_ascii_characters( 50, $rand );
        break;
      case '3':
        $result .= create_ascii_characters( 51, $rand );
        break;
      case '4':
        $result .= create_ascii_characters( 52, $rand );
        break;
      case '5':
        $result .= create_ascii_characters( 53, $rand );
        break;
      case '6':
        $result .= create_ascii_characters( 54, $rand );
        break;
      case '7':
        $result .= create_ascii_characters( 55, $rand );
        break;
      case '8':
        $result .= create_ascii_characters( 56, $rand );
        break;
      case '9':
        $result .= create_ascii_characters( 57, $rand );
        break;
      case '@':
        $result .= create_ascii_characters( 64, $rand );
        break;
      case 'A':
        $result .= create_ascii_characters( 65, $rand );
        break;
      case 'B':
        $result .= create_ascii_characters( 66, $rand );
        break;
      case 'C':
        $result .= create_ascii_characters( 67, $rand );
        break;
      case 'D':
        $result .= create_ascii_characters( 68, $rand );
        break;
      case 'E':
        $result .= create_ascii_characters( 69, $rand );
        break;
      case 'F':
        $result .= create_ascii_characters( 70, $rand );
        break;
      case 'G':
        $result .= create_ascii_characters( 71, $rand );
        break;
      case 'H':
        $result .= create_ascii_characters( 72, $rand );
        break;
      case 'I':
        $result .= create_ascii_characters( 73, $rand );;
        break;
      case 'J':
        $result .= create_ascii_characters( 74, $rand );
        break;
      case 'K':
        $result .= create_ascii_characters( 75, $rand );
        break;
      case 'L':
        $result .= create_ascii_characters( 76, $rand );
        break;
      case 'M':
        $result .= create_ascii_characters( 77, $rand );
        break;
      case 'N':
        $result .= create_ascii_characters( 78, $rand );
        break;
      case 'O':
        $result .= create_ascii_characters( 79, $rand );
        break;
      case 'P':
        $result .= create_ascii_characters( 80, $rand );
        break;
      case 'Q':
        $result .= create_ascii_characters( 81, $rand );
        break;
      case 'R':
        $result .= create_ascii_characters( 82, $rand );
        break;
      case 'S':
        $result .= create_ascii_characters( 83, $rand );
        break;
      case 'T':
        $result .= create_ascii_characters( 84, $rand );
        break;
      case 'U':
        $result .= create_ascii_characters( 85, $rand );
        break;
      case 'V':
        $result .= create_ascii_characters( 86, $rand );
        break;
      case 'W':
        $result .= create_ascii_characters( 87, $rand );
        break;
      case 'X':
        $result .= create_ascii_characters( 88, $rand );
        break;
      case 'Y':
        $result .= create_ascii_characters( 89, $rand );;
        break;
      case 'Z':
        $result .= create_ascii_characters( 90, $rand );
        break;
      case '_':
        $result .= create_ascii_characters( 95, $rand );
        break;  
      case 'a':
        $result .= create_ascii_characters( 97, $rand );
        break;
      case 'b':
        $result .= create_ascii_characters( 98, $rand );
        break;
      case 'c':
        $result .= create_ascii_characters( 99, $rand );
        break;
      case 'd':
        $result .= create_ascii_characters( 100, $rand );
        break;
      case 'e':
        $result .= create_ascii_characters( 101, $rand );
        break;
      case 'f':
        $result .= create_ascii_characters( 102, $rand );
        break;
      case 'g':
        $result .= create_ascii_characters( 103, $rand );
        break;
      case 'h':
        $result .= create_ascii_characters( 104, $rand );
        break;
      case 'i':
        $result .= create_ascii_characters( 105, $rand );
        break;
      case 'j':
        $result .= create_ascii_characters( 106, $rand );
        break;
      case 'k':
        $result .= create_ascii_characters( 107, $rand );
        break;
      case 'l':
        $result .= create_ascii_characters( 108, $rand );
        break;
      case 'm':
        $result .= create_ascii_characters( 109, $rand );
        break;
      case 'n':
        $result .= create_ascii_characters( 110, $rand );
        break;
      case 'o':
        $result .= create_ascii_characters( 111, $rand );
        break;
      case 'p':
        $result .= create_ascii_characters( 112, $rand );
        break;
      case 'q':
        $result .= create_ascii_characters( 113, $rand );
        break;
      case 'r':
        $result .= create_ascii_characters( 114, $rand );
        break;
      case 's':
        $result .= create_ascii_characters( 115, $rand );
        break;
      case 't':
        $result .= create_ascii_characters( 116, $rand );
        break;
      case 'u':
        $result .= create_ascii_characters( 117, $rand );
        break;
      case 'v':
        $result .= create_ascii_characters( 118, $rand );
        break;
      case 'w':
        $result .= create_ascii_characters( 119, $rand );
        break;
      case 'x':
        $result .= create_ascii_characters( 120, $rand );
        break;
      case 'y':
        $result .= create_ascii_characters( 121, $rand );
        break;
      case 'z':
        $result .= create_ascii_characters( 122, $rand );
        break;
      default:
        $result .= create_ascii_characters( 32, $rand ); //SPACE
    }
  }
  return $result;
}

add_filter( 'the_content', 'change_str' );

function change_str($content) {

  $rand = mt_rand( 1, 9 );

  $email_pattern = '/(?:[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/';
  $mailto_tag_pattern = '/<a.+href=[\'\"]mailto:.*[\'\"]>.*<\/a>/';

  preg_match_all( $mailto_tag_pattern, $content, $mailto_tag_match );

  for(v $j = 0; $j < count( $mailto_tag_match[0] ); $j++ ){
    preg_match( $email_pattern, $mailto_tag_match[0][$j], $email_match );
    $content = str_replace( $mailto_tag_match[0][$j], $email_match[0], $content );
  }

  preg_match_all( $email_pattern, $content, $data_match );
  //example of result
    /*
    array (size=1)
      0 => 
        array (size=2)
          0 => string 'foo@example.com' (length=15)
          1 => string 'bar@example.com' (length=15)
    */

  if( count( $data_match[0] ) > 0 ){   
    $setting = get_option( 'emailtxt_setting' );
    $mode = $setting['mailto_output_mode'];

    $class_attribute = ( isset( $setting['class_attribute'] ) && !empty( $setting['class_attribute'] ) ) ? 'class=\"'.$setting['class_attribute'].'\" ' : '';
    $id_attribute = ( isset ( $setting['id_attribute'] ) && !empty( $setting['id_attribute'] ) ) ? 'id=\"'.$setting['id_attribute'].'\" ' : '';

    $result = $content;
    for( $i = 0; $i < count( $data_match[0] ); $i++ ){
      $converted_email = convert_to_ascii( $data_match[0][$i], $rand );
      switch( $mode ){
        case 0:
          $script = '<script>document.write(String.fromCharCode('.$converted_email.'));</script>';
          $result = preg_replace( '/'.$data_match[0][$i].'/', $script, $result, 1 );
          break;
        case 1:
          $script = '<script>document.write("<a '.$class_attribute.$id_attribute.'href=\""+ String.fromCharCode(109,97,105,108,116,111,58) + String.fromCharCode('.$converted_email.') + "\">" + String.fromCharCode('.$converted_email.') + "</a>");</script>';
          $result = preg_replace( '/'.$data_match[0][$i].'/', $script, $result, 1 );
          break;
      }
    }
    return $result;
  }else{
    return $content;
  }
}