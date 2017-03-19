<?php
include('header.php');

include('sidebar.php');
?>


  <section id="main" class="column">

    <article class="module width_full">
      <header><h3>Alacak Ekle \-/ Seçilen kişiye borcumuzu ekleyebiliriz.</h3></header>
        <div class="module_content">
          <?php
          if(isset($_GET['kisi_id']))
          { //Kişi seçilmiş ve alacak miktarı giriliyor. 3.Düzey
              $kisi_id = $_GET['kisi_id'];
              if(isset($_POST['alacak_ekle_submit']))
              { // Alacak miktarı girilmiş, alacak miktarı vt'ye işleniyor.
                $alacak_miktari = $_POST['alacak_miktari'];
                $alacak_aciklama = $_POST['alacak_aciklama'];

                alacak_ekle($alacak_miktari, $alacak_aciklama, $kisi_id, $_SESSION['eleman_id'],"borc_degil");
              }
              else {
                print_kisi_info($kisi_id);
                ?>
                <h3>* 'lı alanların doldurulması zorunludur.</h3>
                <form method="POST" action="alacak_ekle.php?kisi_id=<?php echo $kisi_id; ?>">
                  <table>
                    <tr>
                      <td>Miktar</td>
                      <td> : <input type="text" name="alacak_miktari"/> *</td>
                    </tr>
                    <tr>
                      <td>Açıklama</td>
                      <td> : <textarea name="alacak_aciklama" rows="4" cols="35"></textarea> * </td>
                    </tr>

                    <tr>
                      <td colspan="2"><input type="submit" name="alacak_ekle_submit" value="Alacak Ekle"/></td>
                    </tr>
                  </table>
                </form>
                <?php
              }
          }
          else {
            if(isset($_GET['kisi_submit']))
            { // Kişi seçilmemiş, kişiler listelenmiş. 2.Düzey
              $kisi_adi = $_GET['kisi_adi'];
              $kisi_adi = mb_strtoupper($kisi_adi);
              $query = "WHERE unvan LIKE '%".$kisi_adi."%'";
              kisi_listele($query, "alacak_ekle.php","Seç","alacak_ekle.php");
            }
            else { // Kişi seçilmemiş , hatta kişiler listelenmemiş. 1. Düzey
              ?>
              Kişinin tam adını girmenize gerek yoktur. Örn: MUSTAFA için, MUS veya MU veya MUSTA girebilirsiniz.<br><br>
              <form action="alacak_ekle.php" method="get">
                Kişi adı : <input type="text" name="kisi_adi"/> <input type="submit" name="kisi_submit" value="Ara"/>
              </form>
              <?php
            }
          }
          ?>
        </div>

    </article><!-- end of styles article -->
    <div class="spacer"></div>
  </section>

<?php
include('footer.php');
?>
