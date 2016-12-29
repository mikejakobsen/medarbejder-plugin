<?php if (! defined('ABSPATH')) {
    exit;
} ?>
<style>
      #team_b_shortcode{
      background:#fff!important;
      box-shadow: 0 0 20px rgba(0,0,0,.2);
      }
      #team_b_shortcode .hndle , #team_b_shortcode .handlediv{
      display:none;
      }
      #team_b_shortcode p{
      color:#000;
      font-size:15px;
      }
      #team_b_shortcode input {
      font-size: 16px;
      padding: 8px 10px;
      width:100%;
      }

</style>
<h3>Kode</h3>
<p><?php _e("Indsæt koden på siden, du ønsker at vise medarbejderne på.", medarbejdere);?></p>
<input readonly="readonly" type="text" value="<?php echo "[TEAM_B id=".get_the_ID()."]"; ?>">
