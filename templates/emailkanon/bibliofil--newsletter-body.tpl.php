<?php

/**
 * @file
 * Newsletter body.
 */
$image_path = url(drupal_get_path('module', 'emailkanon') . '/templates', [
  'absolute' => TRUE,
  'language' => FALSE,
]);

if (function_exists('color_get_palette')) {
  $current_theme = variable_get('theme_default', 'none');
  $palette = color_get_palette($current_theme);
  extract($palette, EXTR_PREFIX_SAME, "wddx");

  $content_background_color = $base;
  $footer_background_color = $primary;
  $header_background_color = $primary;
  $topbar_text_color = $link;
  $footer_text_color = $text_on_primary;
  $labels_text_color_color = $text_on_primary;
}
?>
<style>
    h2.element-invisible {
        display: none;
    }
</style>
<table class="test" style="border-collapse: collapse" border="0" cellpadding="0" cellspacing="0">
  <tbody>
  <tr>
    <td style="border-collapse: collapse; height: 40px; background-color: <?php echo($header_background_color); ?>" height="8" width="600" bgcolor="<?php echo($primary); ?>">
      <p style="font-size: 11px; line-height: 15px; font-family: Helvetica, Arial, sans-serif; margin-right: 10px; text-align: right; color: <?php echo($topbar_text_color); ?>; padding: 0">
        <a href="{{unsubscribe_url}}" style="color: <?php echo($text_on_primary); ?>;"><?php print t('Unsubscribe'); ?></a>
      </p>
    </td>
  </tr>
  <tr>
    <td style="border-collapse: collapse;" height="8" width="600"><br/></td>
  </tr>
  <tr bgcolor="<?php echo($content_background_color); ?>">
    <td style="border-collapse: collapse;">
      <table style="border-collapse: collapse" width="600" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr>
          <td style="border-collapse: collapse;">
            <?php if (!empty($newsletter->image)): ?>
              <table style="border-collapse: collapse;" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                  <td style="border-collapse: collapse;" height="15" width="30"><br/></td>
                  <td style="border-collapse: collapse;" height="15" width="540"><br/></td>
                  <td style="border-collapse: collapse;" height="15" width="30"><br/></td>
                </tr>
                <tr>
                  <td style="border-collapse: collapse;" width="30"><br/></td>
                  <td style="border-collapse: collapse;" width="540" align="center">
                    <?php echo $newsletter->image; ?>
                  </td>
                  <td style="border-collapse: collapse;" width="30"><br/></td>
                </tr>
                <tr>
                  <td style="border-collapse: collapse;" height="15" width="30"><br/></td>
                  <td style="border-collapse: collapse;" height="15" width="540"><br/></td>
                  <td style="border-collapse: collapse;" height="15" width="30"><br/></td>
                </tr>
                </tbody>
              </table>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <td style="border-collapse: collapse;">
            <table style="border-collapse: collapse;" border="0" cellpadding="0" cellspacing="0">
              <tbody>
              <tr>
                <td style="border-collapse: collapse;" width="30"><br/></td>
                <td style="border-collapse: collapse;" width="540" align="left">
                  <h1 style="margin-bottom: 20px; font-size: 24px; font-weight: bold; line-height: 36px; margin-top: 10px; font-family: Helvetica, Arial, sans-serif; color: #ffffff !important;">
                    <?php echo $newsletter->title ?>
                  </h1>
                  <div style="font-size: 15px; margin: 1em 0; line-height: 21px; font-family: Helvetica, Arial, sans-serif; color: <?php echo($text); ?>;">
                    <?php if (!empty($newsletter->summary)): ?>
                      <?php echo $newsletter->summary; ?>
                    <?php endif; ?>
                  </div>
                </td>
                <td style="border-collapse: collapse;" width="30"><br/></td>
              </tr>
              <tr>
                <td style="border-collapse: collapse;" height="15" width="30"><br/></td>
                <td style="border-collapse: collapse;" height="15" width="540"><br/></td>
                <td style="border-collapse: collapse;" height="15" width="30"><br/></td>
              </tr>
              </tbody>
            </table>
          </td>
        </tr>
        </tbody>
      </table>
    </td>
  </tr>
  </tbody>
</table>

<?php if ($newsletter_news_qty) : ?>
  <table style="border-collapse: collapse;" border="0" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td style="border-collapse: collapse;" height="8" width="600"><br/></td>
      </tr>
      <tr>
        <td style="border-collapse: collapse;" height="8" width="600" bgcolor="<?php echo($content_background_color); ?>"><br/></td>
      </tr>
      <tr bgcolor="<?php echo($content_background_color); ?>">
        <td style="border-collapse: collapse;">
          <table style="border-collapse: collapse;" width="600" border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td style="border-collapse: collapse;">
                  <table style="border-collapse: collapse;" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td style="border-collapse: collapse;" height="20" width="30"><br/></td>
                        <td style="border-collapse: collapse;" height="20" width="540"><br/></td>
                        <td style="border-collapse: collapse;" height="20" width="30"><br/></td>
                      </tr>
                      <tr>
                        <td style="border-collapse: collapse;" width="30"><br/></td>
                        <td style="border-collapse: collapse;" width="540" align="left">
                          <h1 style="margin-bottom: 20px; font-size: 24px; font-weight: bold; line-height: 36px; margin-top: 0; font-family: Helvetica, Arial, sans-serif; color: <?php echo($text); ?> !important;"><?php print t('News'); ?></h1>
                          <?php foreach ($newsletter_items as $type => $type_nodes): ?>
                            <?php foreach ($type_nodes as $newsletter_node): ?>
                              <?php if ($type == 'ding_news'): ?>
                                <tr>
                                  <td style="border-collapse: collapse;" height="20" width="30"><br/></td>
                                  <td style="border-collapse: collapse;" height="20" width="540">
                                    <table style="border-collapse: collapse; padding: 20px; margin: 0 0 10px 0; background-color: #4d4d51; ?>" border="0" cellpadding="0" cellspacing="0" width="540">
                                      <tbody>
                                        <tr>
                                          <td width="140" valign="top" align="left">
                                            <?php if (!empty($newsletter_node->image)): ?>
                                              <a href="<?php echo $newsletter_node->url; ?>" style="display: block; margin: 20px;">
                                                <?php echo $newsletter_node->image; ?>
                                              </a>
                                            <?php endif; ?>
                                          </td>
                                          <td valign="top" width="0" height="20" align="left"><br/></td>
                                          <td valign="top" align="left">
                                            <h2 style="margin: 20px 20px 5px 0; font-size: 18px; font-weight: bold; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: <?php echo($text); ?> !important;">
                                              <a href="<?php echo $newsletter_node->url; ?>" style="color:<?php echo($text); ?> !important; text-decoration: none;">
                                                <?php echo $newsletter_node->title; ?>
                                              </a>
                                            </h2>
                                            <?php if (!empty($newsletter_node->category)): ?>
                                              <div color="<?php echo($labels_text_color_color) ?>" style="color: <?php echo($text); ?> !important; padding: 5px; font-size: 12px; background-color: <?php echo($link); ?>; text-decoration: none; display: inline-block; font-family: Helvetica, Arial, sans-serif;"><?php echo $newsletter_node->category ?></div>
                                            <?php endif; ?>
                                            <div style="font-size: 15px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; color: <?php echo($text); ?>; margin: 10px 20px 20px 0;">
                                              <?php echo $newsletter_node->summary; ?>
                                            <div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td colspan="3" width="540">
                                            <div style="float: right; padding-right: 15px; font-family: Helvetica, Arial, sans-serif; color: <?php echo($text_on_primary) ?> !important;  border-radius: 5px; padding: 20px 15px; margin-right: 10px; background-color: <?php echo($link) ?> !important;"><?php echo $newsletter_node->seemore; ?></div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td colspan="3" width="540" height="30"><br/></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                  <td style="border-collapse: collapse;" height="20" width="30"><br/></td>
                                </tr>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endforeach; ?>
                        </td>
                        <td style="border-collapse: collapse;" width="30"><br/></td>
                      </tr>
                      <tr>
                        <td style="border-collapse: collapse;" height="15" width="30"><br/></td>
                        <td style="border-collapse: collapse;" height="15" width="540"><br/></td>
                        <td style="border-collapse: collapse;" height="15" width="30"><br/></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
<?php endif ?>

<?php if ($newsletter_events_qty) : ?>
  <table style="border-collapse: collapse;" border="0" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td style="border-collapse: collapse;" height="8" width="600"><br/></td>
      </tr>
      <tr>
        <td style="border-collapse: collapse;" height="8" width="600" bgcolor="<?php echo($content_background_color); ?>"><br/></td>
      </tr>
      <tr bgcolor="<?php echo($content_background_color); ?>">
        <td style="border-collapse: collapse;">
          <table style="border-collapse: collapse;" width="600" border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td style="border-collapse: collapse;">
                  <table style="border-collapse: collapse;" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td style="border-collapse: collapse;" height="20" width="30"><br/></td>
                        <td style="border-collapse: collapse;" height="20" width="540"><br/></td>
                        <td style="border-collapse: collapse;" height="20" width="30"><br/></td>
                      </tr>
                      <tr>
                        <td style="border-collapse: collapse;" width="30"><br/></td>
                        <td style="border-collapse: collapse;" width="540" align="left">
                          <h1 style="margin-bottom: 20px; font-size: 24px; font-weight: bold; line-height: 36px; margin-top: 0; font-family: Helvetica, Arial, sans-serif; color: <?php echo($text); ?> !important;">
                            <?php print t('Events'); ?>
                          </h1>
                          <?php foreach ($newsletter_items as $type => $type_nodes): ?>
                            <?php foreach ($type_nodes as $newsletter_node): ?>
                              <?php if ($type == 'ding_event'): ?>
                                <tr>
                                  <td style="border-collapse: collapse;" height="20" width="30"><br/></td>
                                  <td style="border-collapse: collapse;" height="20" width="540">
                                    <table style="border-collapse: collapse; background-color: #4d4d51; margin-bottom: 10px;" border="0" cellpadding="0" cellspacing="0" width="540">
                                      <tbody>
                                        <tr style=" background-color: #353536" valign="top">
                                          <td width="200">
                                            <table style="border-collapse: collapse;" width="200" border="0" cellpadding="0" cellspacing="0">
                                              <tbody>
                                                <tr>
                                                  <td style="border-collapse: collapse; font-size: 1px;" colspan="5" height="10"></td>
                                                </tr>
                                                <tr>
                                                  <td colspan="4">
                                                    <table style="border-collapse: collapse;" width="70" border="0" cellpadding="0" cellspacing="0">
                                                      <tbody>
                                                        <tr>
                                                          <td height="10" width="10"></td>
                                                          <td style="border-collapse:collapse; text-align: center; background-color: <?php echo($primary); ?>" width="60" valign="top" colspan="3">
                                                            <span style="display: block; padding-top: 5px; margin: 4px 10px 3px; font-size: 16px; font-weight: bold; line-height: 16px; margin-top: 0; font-family: Helvetica, Arial, sans-serif; color: <?php echo($labels_text_color_color); ?>;">
                                                              <?php echo date('d', strtotime($newsletter_node->date)); ?>
                                                            </span>
                                                          </td>
                                                        </tr>
                                                        <tr>
                                                          <td height="10" width="10"></td>
                                                          <td style="border-collapse:collapse; text-align: center; background-color: #fff;" width="60" valign="top" colspan="3">
                                                            <span style="display: block; margin: 10px; font-size: 20px; line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: #000000; ?>;">
                                                              <?php echo date('M', strtotime($newsletter_node->date)); ?>
                                                            </span>
                                                          </td>
                                                        </tr>
                                                      </tbody>
                                                    </table>
                                                  </td>
                                                  <td></td>
                                                </tr>
                                                <tr>
                                                  <td style="border-collapse: collapse; font-size: 1px;" colspan="5" height="10"></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                          <td colspan="2" width="340"></td>
                                        </tr>
                                        <tr width="540">
                                          <td style="border-collapse: collapse;" width="200" valign="top">
                                            <?php if (!empty($newsletter_node->image)): ?>
                                              <a href="<?php echo $newsletter_node->url; ?>" style="display: block; margin: 20px;">
                                                <?php echo $newsletter_node->image; ?>
                                              </a>
                                            <?php endif; ?>
                                          </td>
                                          <td valign="top" align="left" colspan="2" width="340">
                                            <h2 style=" margin: 20px 20px 5px 0; font-size: 18px; font-weight: bold; line-height:24px; font-family: Helvetica, Arial, sans-serif; color: <?php echo($text); ?> !important;">
                                              <a href="<?php echo $newsletter_node->url; ?>" style="color: <?php echo($text); ?> !important; text-decoration: none;">
                                                <?php echo $newsletter_node->title; ?>
                                              </a>
                                            </h2>
                                            <?php if (!empty($newsletter_node->category)): ?>
                                              <div color="<?php echo($labels_text_color_color) ?>" style="color: <?php echo($text) ?> !important; padding: 5px; background-color: <?php echo($link); ?>; text-decoration: none; display: inline-block;"><?php echo $newsletter_node->category ?></div>
                                            <?php endif; ?>
                                            <div style="font-size: 15px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; margin-top: 10px;">
                                              <?php if (!empty($newsletter_node->libraries)): echo $newsletter_node->libraries; endif; ?>
                                                <span style="margin-left: 10px; color: <?php echo($text); ?>; font-size: 14px; text-transform: uppercase; padding: 0 4px; text-decoration: none; font-family: Helvetica, Arial, sans-serif;">
                                                  <?php if (!empty($newsletter_node->fee)): echo ' - ' . $newsletter_node->fee . ' kr.'; endif; ?>
                                                </span>
                                            </div>
                                            <div style="font-size: 15px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; margin-top: 10px;">
                                              <?php if (!empty($newsletter_node->summary)): echo $newsletter_node->summary; endif; ?>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td colspan="3" width="540">
                                            <div style="float: right; padding-right: 15px;font-family: Helvetica, Arial, sans-serif; color: <?php echo($text_on_primary) ?> !important; border-radius: 5px; padding: 20px 15px; margin-right: 10px; background-color: <?php echo($link) ?> !important;"><?php echo $newsletter_node->seemore; ?></div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td colspan="3" width="540" height="30"><br/></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                  <td style="border-collapse: collapse;" height="20" width="30"><br/></td>
                                </tr>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endforeach; ?>
                        </td>
                        <td style="border-collapse: collapse;" width="30"><br/></td>
                      </tr>
                      <tr>
                        <td style="border-collapse: collapse;" height="15" width="30"><br/></td>
                        <td style="border-collapse: collapse;" height="15" width="540"><br/></td>
                        <td style="border-collapse: collapse;" height="15" width="30"><br/></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
<?php endif ?>

<?php if ($newsletter->materials): ?>
  <table style="border-collapse: collapse;" border="0" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td style="border-collapse: collapse;" height="8" width="600"><br/></td>
      </tr>
      <tr>
        <td style="border-collapse: collapse;" height="8" width="600" bgcolor="<?php echo($content_background_color); ?>"><br/></td>
      </tr>
      <tr bgcolor="<?php echo($content_background_color); ?>">
        <td style="border-collapse: collapse;">
          <table style="border-collapse: collapse;" width="600" border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td style="border-collapse: collapse;">
                  <table style="border-collapse: collapse;" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td style="border-collapse: collapse;" width="30"><br/></td>
                        <td style="border-collapse: collapse;" width="540" align="left">
                          <h1 style="margin-bottom: 20px; font-size: 24px; font-weight: bold; line-height: 36px; margin-top: 0; font-family: Helvetica, Arial, sans-serif; color: <?php echo($text); ?> !important;">
                            <?php print t('Related materials'); ?>
                          </h1>
                          <?php foreach ($newsletter->materials as $material): ?>
                            <table style="border-collapse: collapse; background-color: #4d4d51; ?>" width="540" border="0" cellpadding="0" cellspacing="0">
                              <tbody class="related-item">
                                <tr bgcolor="<?php echo($content_background_color); ?>">
                                  <td colspan="3" height="10"></td>
                                </tr>
                                <tr>
                                  <?php if (!empty($material['ting_cover'])): ?>
                                    <td style="border-collapse: collapse;" width="140" valign="top">
                                      <a href="<?php echo $material["ting_title"]['url']; ?>" style="margin: 10px;">
                                        <?php echo render($material['ting_cover']); ?>
                                      </a>
                                    </td>
                                  <?php endif; ?>
                                  <td valign="top" align="left" colspan="2">
                                    <h2 style=" margin: 20px 0 5px 20px; font-size: 18px; font-weight: bold; line-height:24px; font-family: Helvetica, Arial, sans-serif; color: <?php echo($text); ?> !important;">
                                      <a href="<?php echo $material["ting_title"]['url']; ?>" style="color: <?php echo($text); ?> !important; text-decoration: none;">
                                        <?php echo $material["ting_title"]['title']; ?>
                                      </a>
                                    </h2>
                                    <div style=" margin: 20px 0 5px 20px;">
                                      <span style=" font-size: 14px; font-weight: bold; line-height:18px; font-family: Helvetica, Arial, sans-serif; color: <?php echo($text); ?> !important;">
                                        <?php if (isset($material['ting_author'][0])) {
                                          echo $material['ting_author'][0];
                                        }
                                        ?>
                                      </span>
                                      <?php if (!empty($material['ting_date'])): ?>
                                      <span style=" font-size: 14px; font-weight: normal; line-height:18px; font-family: Helvetica, Arial, sans-serif; color: <?php echo($text); ?> !important;">
                                        (<?php echo $material['ting_date']; ?>)
                                      </span>
                                      <?php endif ?>
                                    </div>
                                    <div style=" margin: 20px 0 20px 20px; font-size: 15px; line-height: 21px; font-family: Helvetica, Arial, sans-serif;">
                                      <?php echo $material['ting_abstract']; ?>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          <?php endforeach; ?>
                        </td>
                        <td style="border-collapse: collapse;" width="30"><br/></td>
                      </tr>
                      <tr>
                        <td style="border-collapse: collapse;" height="15" width="30"><br/></td>
                        <td style="border-collapse: collapse;" height="15" width="540"><br/></td>
                        <td style="border-collapse: collapse;" height="15" width="30"><br/></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
<?php endif ?>

<?php if ($newsletter->footer): ?>
  <table style="border-collapse: collapse" border="0" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td style="border-collapse: collapse;" height="8" width="600"><br/></td>
      </tr>
      <tr>
        <td style="border-collapse: collapse;" height="8" width="600" bgcolor="<?php echo($footer_background_color); ?>"><br/></td>
      </tr>
      <tr bgcolor="<?php echo($footer_background_color); ?>">
        <td style="border-collapse: collapse;">
          <table style="border-collapse: collapse" width="600" border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td style="border-collapse: collapse;">
                  <table style="border-collapse: collapse;" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td style="border-collapse: collapse;" width="30"><br/></td>
                        <td style="border-collapse: collapse;" width="540" align="left">
                          <div style="font-size: 15px; margin: 1em 0; line-height: 21px; font-family: Helvetica, Arial, sans-serif; color: <?php echo($footer_text_color); ?>;">
                            <?php echo $newsletter->footer['#markup']; ?>
                          </div>
                        </td>
                        <td style="border-collapse: collapse;" width="30"><br/></td>
                      </tr>
                      <tr>
                        <td style="border-collapse: collapse;" height="15" width="30"><br/></td>
                        <td style="border-collapse: collapse;" height="15" width="540"><br/></td>
                        <td style="border-collapse: collapse;" height="15" width="30"><br/></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
<?php endif; ?>
