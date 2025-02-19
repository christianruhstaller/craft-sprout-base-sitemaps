<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com/
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   http://sprout.barrelstrengthdesign.com/license
 */

namespace barrelstrength\sproutbasesitemaps\models;

use barrelstrength\sproutbase\base\SharedPermissionsInterface;
use craft\base\Model;
use Craft;

/**
 *
 * @property array  $sharedPermissions
 * @property string $mainPluginHandle
 * @property array  $settingsNavItems
 */
class Settings extends Model implements SharedPermissionsInterface
{
    /**
     * @var string
     */
    public $pluginNameOverride = '';

    /**
     * @var bool
     */
    public $enableCustomSections = false;

    /**
     * @var bool
     */
    public $enableDynamicSitemaps = true;

    /**
     * @var bool
     */
    public $enableMultilingualSitemaps = false;

    /**
     * @var int
     */
    public $totalElementsPerSitemap = 500;

    /**
     * @var array
     */
    public $siteSettings = [];

    /**
     * @var array
     */
    public $groupSettings = [];

    /**
     * @inheritdoc
     */
    public function getSettingsNavItems(): array
    {
        return [
            'general' => [
                'label' => Craft::t('sprout-base-sitemaps', 'General'),
                'url' => 'sprout-sitemaps/settings/general',
                'selected' => 'general',
                'template' => 'sprout-base-sitemaps/settings/general'
            ],
            'sitemaps' => [
                'label' => Craft::t('sprout-base-sitemaps', 'Sitemaps'),
                'url' => 'sprout-sitemaps/settings/sitemaps',
                'selected' => 'sitemaps',
                'template' => 'sprout-base-sitemaps/settings/sitemaps'
            ]
        ];
    }

    /**
     * Shared permissions they may be prefixed by another plugin. Before checking
     * these permissions the plugin name will be determined from the URL and appended.
     *
     * @example
     * /admin/sprout-reports/page => sproutReports-viewReports
     * /admin/sprout-forms/page => sproutForms-viewReports
     *
     * @return array
     */
    public function getSharedPermissions(): array
    {
        return [
            'editSitemaps'
        ];
    }
}