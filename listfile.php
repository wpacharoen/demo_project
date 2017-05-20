<style media="screen">
.btnlist{
  color:#aaa;
  background-color:#222;
  border-radius:5px;
  padding:5px;
}
.btnlist:hover{
  color:#fff;
}
</style>

  <?php
  if ($handle = opendir('FilePDF_upload')) {
      while (false !== ($entry = readdir($handle))) {
          if ($entry != "." && $entry != "..") {
              echo '&nbsp;&nbsp;|--- <a href="#" class="btnlist" onclick="seturl(\''.$entry.'\')"><img src="http://cospace.azurewebsites.net/demo_project/img/Alecive-Flatwoken-Apps-Pdf.ico" alt="" width="15px">  '.$entry.'</a><br>';
          }
      }
    closedir($handle);
  }
   ?>
