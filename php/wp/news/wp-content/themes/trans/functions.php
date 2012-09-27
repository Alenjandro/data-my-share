<?php function insert_image_notice(){
echo '<span style="color: #c00;padding-left:10px;">※画像は幅650px以下、バナーは160×43としてください。</span>';

}
add_action( 'media_buttons', 'insert_image_notice', 9);

?>