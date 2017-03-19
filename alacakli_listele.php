<?php
include('header.php');

include('sidebar.php');
?>


  <section id="main" class="column">

    <article class="module width_full">
      <header><h3>Alacaklı Listele</h3></header>
        <div class="module_content">
          <?php
            if(isset($_GET['bolge']))
            {
              $bolge = $_GET['bolge'];
              $sorgu = "WHERE durum = 2 && kisi_bolge = $bolge";
              kisi_listele($sorgu,"alacakli_listele.php","Detay Gör", "odeme_detay.php");
            }
            else {
          ?>
          <form name="bolge_sec" method="get">
            <table>
              <tr><td>Bölge : </td><td><?php bolge_yaz(); ?></td><td><input type="submit" name="bolge_sec" value="Bölge Seç"/></td></tr>
            </table>
          </form>
          <?php
            }
           ?>
        </div>
    </article><!-- end of styles article -->
    <div class="spacer"></div>
  </section>

<?php
include('footer.php');
?>
