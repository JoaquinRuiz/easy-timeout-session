<?php

/**
 * The Easy Timeout Session is a plugin that allows you to change the
 * session timeout for a wordpress user. This particular file is
 * responsible for including the dependencies and starting the plugin.
 *
 * @package ETS
 */

?>

<div class="ets-container">
    <div class="ets-header">
        <img src="<?php echo  plugins_url( '../img/title.png', __FILE__ )?>">
        <div class="dashicons dashicons-wordpress easy-icon"></div>

    </div>
    <div class="ets-inside">
        <div class="ets-left">
            <div class="ets-left-inside">
                <form method="post" action="options.php" enctype="multipart/form-data">
                    <?php settings_fields( 'cts' ); ?>
                    <?php do_settings_sections( 'cts' ); ?>
                    <?php $cts=get_option('cts'); if (!is_array($cts)){ $cts = array(); $cts['num']=''; $cts['val']=''; } ?>
                    <h2>Specify Timeout </h2>
                    <p><strong>minimum:</strong> 5 min | <strong>by default:</strong> 2 days</p>
                    <br/>
                    <input type="text" name="cts[num]" id="cts[num]" value="<?= $cts['num']; ?>" maxlength="7" style="width:75px"/>
                    <input type="radio" name="cts[val]" id="minutes" value="minutes" <?= ($cts['val'] == "minutes" ? "checked" : "") ?>/> <label for="minutes">Minutes</label>
                    <input type="radio" name="cts[val]" id="hours" value="hours" <?= ($cts['val'] == "hours" ? "checked" : "") ?>/> <label for="hours">Hours</label>
                    <input type="radio" name="cts[val]" id="days" value="days" <?= ($cts['val'] == "days" ? "checked" : "") ?>/> <label for="days">Days</label>
                    <?php submit_button(); ?>
                </form>
            </div>
        </div><div class="ets-right">
            <div class="ets-right-inside">
                <h2>"Easy" plugins</h2>
                <p>This plugin is offered for free but you may consider helping the further development of this and others plugins. Thank you! :)</p>
                <br/>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="CHXF6Q9T3YLQU">
                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
                </form>
                <hr>
                <h2>More "Easy" plugins</h2>
                <ul>
                    <li>
                        <a href="https://wordpress.org/plugins/easy-admin-menu/">Easy Admin Menu</a>
                    </li>
                    <li>
                        <a href="https://wordpress.org/plugins/easy-options-page/">Easy Options Page</a>
                    </li>
                    <li>
                        <a href="https://wordpress.org/plugins/easy-timeout-session/">Easy Timeout Session</a>
                    </li>
                </ul>
                <hr>
                <p>Please, rate the plugins, and if you have any problem/feedback, don't hesitate to post in the support forum.</p>
                <p><strong>Enjoy! ;)</strong></p>
            </div>
        </div>
    </div>
</div>
