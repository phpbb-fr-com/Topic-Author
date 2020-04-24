<?php
/**
*
* @package phpBB Extension - Topic Author
* @copyright (c) 2016 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\topicauthor\acp;

class topicauthor_module
{
	public $page_title;
	public $tpl_name;
	public $u_action;

	function main($id, $mode)
	{
		global $phpbb_container;

		/** @type \phpbb\language\language $language Language object */
		$language = $phpbb_container->get('language');
		// Add the ACP lang file
		$language->add_lang('acp_topicauthor', 'dmzx/topicauthor');

		// Get an instance of the admin controller
		/** @type \dmzx\topicauthor\controller\admin_controller $admin_controller */
		$admin_controller = $phpbb_container->get('dmzx.topicauthor.admin.controller');

		// Make the $u_action url available in the admin controller
		$admin_controller->set_page_url($this->u_action);

		switch ($mode)
		{
			case 'config':
				// Load a template from adm/style for our ACP page
				$this->tpl_name = 'acp_topicauthor_config';
				// Set the page title for our ACP page
				$this->page_title = $language->lang('ACP_TOPICAUTHOR_CONFIG_SETTINGS');
				// Load the display options handle in the admin controller
				$admin_controller->display_options();
			break;
		}
	}
}
