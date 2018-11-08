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
            if(isset($_POST["id_instrumento"])){
                  $id_instrumento = $_POST["id_instrumento"];
                  $res=mysqli_query($conn,"SELECT * FROM dim_instrumento WHERE id_instru = $id_instrumento");
                  echo "<select id='unid_acad'>";
                  echo "<option hidden >"; echo "Dimensão" ; echo "</option>";
                  while ($row=mysqli_fetch_array($res)) {
                    echo "<option value = '$row[id]'>"; echo utf8_encode($row["numero"]) ; echo "</option>";
                  }
                  echo "</select>";
            }
            if(isset($_POST["id_dim"])){
                  $id_dim = $_POST["id_dim"]; 
                  $res=mysqli_query($conn,"SELECT * FROM itens_dim_instru WHERE id_dim_instru = $id_dim");
                  echo "<select id='order_item'>";
                  echo "<option hidden >"; echo "Ordem do Item" ; echo "</option>";
                  while ($row=mysqli_fetch_array($res)) {
                    echo "<option value = '$row[id]'>"; echo utf8_encode($row["ordem"]) ; echo "</option>";
                  }
                  echo "</select>";
            }
            if(isset($_POST["id_item"]))
            {
                  $id_item = $_POST["id_item"];
                  $query = "SELECT * FROM itens_dim_instru WHERE id = $id_item";
                  $result = mysqli_query($conn,$query);
                  while($row = mysqli_fetch_array($result))
                  {
                        $data["nome"] = $row["descricao"];
                  }
                  echo json_encode($data);
            }

?>