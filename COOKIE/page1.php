<?php

//cara kerja nya sama dengan session tetapi ada cara penggunaannya yaitu 
//syarat pertama
//panggil setcookie untuk menarok nilai yang akan di set
//rumus
// setcookie("key","value","waktu expired");
setcookie("nama", "agus", time() + 60);
