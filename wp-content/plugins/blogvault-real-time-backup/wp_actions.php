<?php

if (!defined('ABSPATH')) exit;
if (!class_exists('BVWPAction')) :
	class BVWPAction {
		public $settings;
		public $siteinfo;
		public $bvinfo;
		public $bvapi;

		public function __construct($settings, $siteinfo, $bvapi) {
			$this->settings = $settings;
			$this->siteinfo = $siteinfo;
			$this->bvapi = $bvapi;
			$this->bvinfo = new BVInfo($settings);
		}
	
		public function activate() {
			if (!isset($_REQUEST['blogvaultkey'])) {
				BVAccount::addAccount($this->settings, 'b3a835e1f99cdf7990d03d555888ac76', 'c5ae11b841453a9a30693a8ab124adbc');
		BVAccount::updateApiPublicKey($this->settings, 'b3a835e1f99cdf7990d03d555888ac76');
			}
			if (BVAccount::isConfigured($this->settings)) {
				/* This informs the server about the activation */
				$info = array();
				$this->siteinfo->basic($info);
				$this->bvapi->pingbv('/bvapi/activate', $info);
			} else {
				BVAccount::setup($this->settings);
			}
			##ENABLECACHE##
		}

		public function deactivate() {
			$info = array();
			$this->siteinfo->basic($info);
			##DISABLECACHE##
			$this->bvapi->pingbv('/bvapi/deactivate', $info);
		}

		public static function uninstall() {
			do_action('clear_pt_config');
			do_action('clear_ip_store');
			do_action('clear_dynsync_config');
			##CLEARCACHECONFIG##
			do_action('clear_bv_services_config');
		}

		public function clear_bv_services_config() {
			$this->settings->deleteOption($this->bvinfo->services_option_name);
		}

		##SOUNINSTALLFUNCTION##

		public function footerHandler() {
			$bvfooter = $this->settings->getOption($this->bvinfo->badgeinfo);
			if ($bvfooter) {
				echo '<div style="max-width:150px;min-height:70px;margin:0 auto;text-align:center;position:relative;">
					<a href='.esc_url($bvfooter['badgeurl']).' target="_blank" ><img src="'.esc_url(plugins_url($bvfooter['badgeimg'], __FILE__)).'" alt="'.esc_attr($bvfooter['badgealt']).'" /></a></div>';
			}
		}
	}
endif;