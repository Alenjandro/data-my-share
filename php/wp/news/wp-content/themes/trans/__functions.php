function insert_image_notice(){
echo '<div style="color: #c00;">記事中に挿入する画像は400×300ピクセル以下としてください。</div>';
}

add_action( 'media_buttons', 'insert_image_notice' 9 );