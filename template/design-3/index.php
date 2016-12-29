<?php if (! defined('ABSPATH')) {
    exit;
} ?>
    <div class="medarbejder__b_row" id="medarbejder__b_row_<?php echo $PostId; ?>">
        <div class="medarbejder__row">
            <style>
            #medarbejder__b_row_<?php echo $PostId; ?> .medarbejder__member_wrapper_inner h3{
                color:<?php echo $team_mb_name_clr; ?> !important;
                font-size:<?php echo $team_mb_name_ft_size; ?>px !important;
                font-family:<?php echo $font_family; ?> !important;
            }

            #medarbejder__b_row_<?php echo $PostId; ?> .medarbejder__b_desig{
                color:<?php echo $team_mb_pos_clr; ?> !important;
                font-size:<?php echo $team_mb_pos_ft_size; ?>px !important;
                font-family:<?php echo $font_family; ?> !important;
            }
            #medarbejder__b_row_<?php echo $PostId; ?> .medarbejder__b_desc{
                color:<?php echo $team_mb_desc_clr; ?> !important;
                font-size:<?php echo $team_mb_desc_ft_size; ?>px !important;
                font-family:<?php echo $font_family; ?> !important;
            }
            #medarbejder__b_row_<?php echo $PostId; ?> .medarbejder__social_div a i{
                color:<?php echo $team_mb_social_icon_clr; ?> !important;
                border-color:<?php echo $team_mb_social_icon_clr; ?> !important;
            }
            #medarbejder__b_row_<?php echo $PostId; ?> .medarbejder__member_wrapper{
                background:<?php echo $team_mb_wrap_bg_clr; ?> !important;
            }
            <?php echo $custom_css; ?>
            </style>
            <?php
            if ($TotalCount!=-1) {
                $i=1;
                switch ($team_layout) {
                    case (6):
                        $row=2;
                        break;
                    case (4):
                        $row=3;
                        break;
                    case (3):
                        $row=4;
                        break;
                }
                foreach ($All_data as $single_data) {
                    $mb_photo = $single_data['mb_photo'];
                    $mb_name = $single_data['mb_name'];
                    $mb_pos = $single_data['mb_pos'];
                    $mb_desc = $single_data['mb_desc'];
                    ?>


                    <div class="col-md-<?php echo $team_layout; ?> medarbejder__column">
                        <div class="medarbejder__member_wrapper">
                            <img class="img-responsive medarbejder__mem_img" src="<?php echo $mb_photo; ?>" alt="<?php echo $mb_name; ?>">
                            <div class="medarbejder__member_wrapper_inner">
                                <h3>
                                    <?php echo $mb_name; ?>
                                </h3>
                                <?php if ($mb_pos!="") {
?><span class="medarbejder__b_desig"> <?php echo $mb_pos; ?> </span> <?php
} ?>
                                <?php if ($mb_desc!="") {
?><p class="medarbejder__b_desc"> <?php echo $mb_desc; ?> </p> <?php
} ?>

                            </div>
                        </div>
                    </div>

                    <?php
                    if ($i%$row==0) {
                        ?>
                        </div>
                        <div class="medarbejder__row">
                        <?php
                    }
                    ?>
                    <?php
                     $i++;
                }
            } else {
                echo "Ingen medarbejdere fundet";
            }

            ?>
        </div>
    </div>


