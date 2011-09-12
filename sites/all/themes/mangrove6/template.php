<?php
// $Id: template.php,v 1.16 2007/10/11 09:51:29 goba Exp $

// DEFINITIONS 
define("BLOCK_QUOTES_BID","1");


/**
* Sets the body-tag class attribute.
*
* Adds 'sidebar-left', 'sidebar-right' or 'sidebars' classes as needed.
*/
function phptemplate_body_class($left, $right) 
{
	if ($left != '' && $right != '') 
	{
		$class = 'sidebars';
	}
	else 
	{
		if ($left != '') 
		{
			$class = 'sidebar-left';
		}
		if ($right != '') 
		{
		$class = 'sidebar-right';
		}
	}
	if (isset($class)) 
	{
		print ' class="'. $class .'"';
	}
} 




/**
* Return a themed breadcrumb trail.
*
* @param $breadcrumb
*   An array containing the breadcrumb links.
* @return a string containing the breadcrumb output.
*/
function phptemplate_breadcrumb($breadcrumb) 
{
	if (!empty($breadcrumb)) 
	{
		return '<div class="breadcrumb">'. implode(' &raquo; ', $breadcrumb) .'</div>';
	}
}

/**
* Allow themable wrapping of all comments.
*/
function phptemplate_comment_wrapper($content, $node) 
{
	if (!$content || $node->type == 'forum') 
	{
		return '<div id="comments">'. $content .'</div>';
	}
	else 
	{
		return '<div id="comments"><h2 class="comments">'. t('Comments') .'</h2>'. $content .'</div>';
	}
}



function phptemplate_preprocess_page(&$variables) 
{
	//for page level variable customizations
	$vars['tabs2'] = menu_secondary_local_tasks();
// Hook into color.module
	if (module_exists('color')) 
	{
		_color_page_alter($vars);
	}
	if 
	(module_exists('taxonomy')) 
	{
		if ($variables['node']->nid)
		{
			foreach (taxonomy_node_get_terms($variables['node']) as $term) 
			{
				if ($term->vid==1)
				{
					$variables['site_section'] = eregi_replace('[^a-z0-9]', '-', $term->name);
				}
			}
		}
		else
		{
			
		}
	}
}



function phptemplate_preprocess_node(&$vars) 
{
	$vars['user']->node = $vars['node'];
	//print_r($vars['user']);
	//print_r($vars['node']);
}

/**
* Returns the rendered local tasks. The default implementation renders
* them as tabs. Overridden to split the secondary tasks.
*
* @ingroup themeable
*/
function phptemplate_menu_local_tasks() 
{
	return menu_primary_local_tasks();
}

function phptemplate_comment_submitted($comment) 
{
	return t('!datetime — !username',
		array(
			'!username' => theme('username', $comment),
			'!datetime' => format_date($comment->timestamp)
		));
}

function phptemplate_node_submitted($node) 
{
	return t('!datetime — !username',
		array(
			'!username' => theme('username', $node),
			'!datetime' => format_date($node->created),
	));
}

/**
* Generates IE CSS links for LTR and RTL languages.
*/
function phptemplate_get_ie_styles() 
{
	global $language;
	
	$iecss = '<link type="text/css" rel="stylesheet" media="all" href="'. base_path() . path_to_theme() .'/fix-ie.css" />';
	if (defined('LANGUAGE_RTL') && $language->direction == LANGUAGE_RTL) 
	{
		$iecss .= '<style type="text/css" media="all">@import "'. base_path() . path_to_theme() .'/fix-ie-rtl.css";</style>';
	}
	return $iecss;
}


/**
* Override or insert PHPTemplate variables into the search_block_form template.
*
* @param $vars
*   A sequential array of variables to pass to the theme template.
* @param $hook
*   The name of the theme function being called (not used in this case.)
*/
 
function phptemplate_preprocess_search_block_form(&$vars, $hook) 
{
	//print '<pre>'. check_plain(print_r($vars, 1)) .'</pre>';die();

	// Modify elements of the search form
	$vars['form']['search_block_form']['#title'] = t('');
	

	// Add a custom class to the search box
	$vars['form']['search_block_form']['#attributes'] = array('class' => t('cleardefault'));
	
	// Change the text on the submit button
	//$vars['form']['submit']['#value'] = t('Go');
	$vars['form']['submit']['#theme'] = 'button';
	$vars['form']['submit']['#button_type'] = 'image';
	$vars['form']['submit']['#attributes'] = array('src' => base_path() . path_to_theme().'/images/menu-collapsed.gif','alt' => t(Search));

	// Rebuild the rendered version (search form only, rest remains unchanged)
	unset($vars['form']['search_block_form']['#printed']);
	$vars['search']['search_block_form'] = drupal_render($vars['form']['search_block_form']);
	
	// Rebuild the rendered version (submit button, rest remains unchanged)
	unset($vars['form']['submit']['#printed']);
	$vars['search']['submit'] = drupal_render($vars['form']['submit']);
	
	// Collect all form elements to make it easier to print the whole form.
	$vars['search_form'] = implode($vars['search']);
	//print '<pre>'. check_plain(print_r($vars['form'], 1)) .'</pre>';die();
}


function phptemplate_button($element) 
{
  // following lines are copied directly from form.inc core file:

  //Make sure not to overwrite classes
  if (isset($element['#attributes']['class'])) 
  {
    $element['#attributes']['class'] = 'form-'. $element['#button_type'] .' '. $element['#attributes']['class'];
  }
  else 
  {
    $element['#attributes']['class'] = 'form-'. $element['#button_type'];
  }

  // here the novelty begins: check if #button_type is normal submit button or image button
  $return_string = '<input '; 
  $die = 0;
  if ($element['#button_type'] == 'image') 
  {
    $return_string .= 'type="image" '; $die = 1;
  }
  else  
  {
    $return_string .= 'type="submit" ';
  }
  $return_string .= (empty($element['#id']) ? '' : 'id="'. $element['#id'] .'" ');
  $return_string .= (empty($element['#name']) ? '' : 'name="'. $element['#name'] .'" ');
  $return_string .= 'value="'. check_plain($element['#value']) .'" ';
  $return_string .= drupal_attributes($element['#attributes']) ." />\n";
	if ($die)
	{	
		//print '<pre><strong>button</strong><br />'. check_plain(print_r($return_string, 1)) .'</pre>';die('2');
		$return_string = '<div class="float-wrapper">'.$return_string.'</div>';

	}
  return $return_string;
}

function phptemplate_preprocess_block(&$vars) 
{
	switch ($vars['block']->module)
	{
		case 'block':
			switch ($vars['block']->delta)
			{
				case BLOCK_QUOTES_BID: // block quotes see definitions at the begining of this file
					if ($vars['user']->node)
					{
						$node = $vars['user']->node;
						if (isset($node->field_content_reference) && current(current($node->field_content_reference))>0)
						{
							sort($node->field_content_reference); //?"sorted":"not sorted";
							if (current(current($node->field_content_reference))>0) // at least one of them is a valid value
							{
								foreach($node->field_content_reference as $key=>$nid)
								{
									if (is_numeric($nid['nid']))
									{
										$vars['block']->content_reference[] = node_load(array('nid' => $nid['nid']));
									}
								}
							}
						}
					} 
				break;
			}			
		break;
	}
}
