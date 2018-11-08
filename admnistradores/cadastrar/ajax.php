<?php
            include('../conexao.php');
            
            if(isset($_POST["id"])){
            $campus = $_POST["id"];
            $res=mysqli_query($conn,"SELECT * FROM unid_academica WHERE id_campus = $campus");
            echo "<select id='unid_acad'>";
            echo "<option hidden >"; echo "Unidade Acadêmica" ; echo "</option>";
            while ($row=mysqli_fetch_array($res)) {
              echo "<option value = '$row[id]'>"; echo utf8_encode($row["nome"]) ; echo "</option>";
            }
            echo "</select>";
         	}
         	if (isset($_POST["id_instru"])) {
               $instrumento = $_POST["id_instru"];
         		$res=mysqli_query($conn,"SELECT * FROM dim_instrumento WHERE id_instru = $instrumento");
	            echo "<select id='n_dim'>";
	            echo "<option hidden >"; echo "Dimensão" ; echo "</option>";
	            while ($row=mysqli_fetch_array($res)) {
	              echo "<option value = '$row[id]'>"; echo utf8_encode($row["numero"]) ; echo "</option>";
	            }
	            echo "</select>";
         	}
            if(isset($_POST["id_unid_acad"])){
                  $id_unid_acad = $_POST["id_unid_acad"];
                  $res=mysqli_query($conn,"SELECT * FROM curso WHERE id_unid_acad = $id_unid_acad");
                  echo "<select id='curso'>";
                  echo "<option hidden >"; echo "Curso" ; echo "</option>";
                  while ($row=mysqli_fetch_array($res)) {
                    echo "<option value = '$row[id]'>"; echo utf8_encode($row["nome"]) ; echo "</option>";
                  }
                  echo "</select>";
            }
?>