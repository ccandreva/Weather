<?php
/**
 * Copyright Zikula Foundation 2009 - Zikula Application Framework
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package Zikula
 * @subpackage Weather
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * A block that shows who is currently using the system.
 */
class Weather_Block_Weather extends Zikula_Controller_AbstractBlock
{
    /**
     * Initialise the block.
     *
     * Adds the blocks security schema to the PN environment.
     *
     * @return void
     */
    public function init()
    {
        SecurityUtil::registerPermissionSchema('Weather::Weatherblock', 'Block ID::');
    }

    /**
     * Return the block info.
     *
     * @return array The blockinfo structure.
     */
    public function info()
    {
        return array(
            'module'         => $this->name,
            'text_type'      => $this->__("Weather Forcast"),
            'text_type_long' => $this->__('Display a weather forcast in a block.'),
            'allow_multiple' => false,
            'form_content'   => false,
            'form_refresh'   => false,
            'show_preview'   => true,
        );
    }

    /**
     * Display the output of the Weather block.
     *
     * @param array $blockinfo A blockinfo structure.
     *
     * @todo Move sql queries to calls to relevant API's.
     *
     * @return string|void The output.
     */
    public function display($blockinfo)
    {
        if (!SecurityUtil::checkPermission('Weather::', $blockinfo['bid'].'::', ACCESS_READ)) {
            return;
        }

        if ($this->view->getCaching()) {
            // Here we use the user id as the cache id since the block shows user based
            // information; username and number of private messages.
            // $uid = UserUtil::getVar('uid');
            // Save for if we allow the block to be custimized per user.
            //$cacheid = $blockinfo['bkey'].'/bid'.$blockinfo['bid'].'/'.($uid ? $uid : 'guest');
            $cacheid = $blockinfo['bkey'].'/bid'.$blockinfo['bid'];
            // We use an individual cache with a lifetime specified on the block configuration.
            $this->view->setCaching(Zikula_View::CACHE_INDIVIDUAL)
                       ->setCacheLifetime($blockinfo['refresh'])
                       ->setCacheId($cacheid);

            // check out if the contents are cached.
            // If this is the case, we do not need to make DB queries.
            if ($this->view->is_cached('Block/weather.tpl')) {
                $blockinfo['content'] = $this->view->fetch('Block/weather.tpl');
                return BlockUtil::themeBlock($blockinfo);
            }
        }

        $weather=ModUtil::apiFunc('Weather', 'user', 'getWeather',
                array('limitEvents' => 5));
        $this->view->assign($weather);
        
        $blockinfo['content'] = $this->view->fetch('Block/weather.tpl');

        return BlockUtil::themeBlock($blockinfo);
    }
}
