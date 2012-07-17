{**
* Weather
*
* @copyright (C) 2012, Christopher X. Candreva <chris@westnet.com>
* @link http://github.com/ccandreva/Weather
* @license See license.txt
* @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
*}

<h2>Weather</h2>
<p>
    Creation Date: {$LastUpdated}
</p>

{foreach from=$forcasts item=forcast}
    <p style="clear: left;">
        <img src="{$forcast.iconurl}" style="float: left;"/>
        <strong>{$forcast.periodname}:</strong>
        <em>{$forcast.conditions}</em>
        {$forcast.worded}
    </p>
{/foreach}