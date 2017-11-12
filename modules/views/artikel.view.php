<h2 class="title-top">Berita Terbaru</h2>
<!--Informasi Terbaru-->
<div class="middle-panel">
    <div class="bottom-middle-panel">
        <ul>
            <?php
            foreach ($data["artikel"] as $artikel) {
                ?>
                <li>
                    <div class="date">
                        <?php echo $artikel->waktu; ?> - 
                        <?php echo date('d,m,y', strtotime($artikel->tanggal)) ?>
                    </div>
                    <div class="title">
                        <a href="<?php echo SITE_URL; ?>?page=artikel&&action=detail&&id=<?php echo $artikel->id_artikel; ?>">
                            <?php echo $artikel->judul; ?>
                        </a>
                    </div>
                    <div class="text">

                        <?php echo substr(strip_tags($artikel->isi), 0, 250); ?>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>