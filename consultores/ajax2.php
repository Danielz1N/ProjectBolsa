<?php
            include('conexao.php');
            $campus = $_GET["campus"];
            $unid_academica = $_GET["unid_academica"];
            $curso = $_GET["curso"];
            $aux = $_GET["aux"];

            if ($aux==0) 
            {
                $res=mysqli_query($conn,"SELECT DISTINCT unid_acad.id_campus,unid_acad.id,unid_acad.nome FROM unid_acad INNER JOIN instru_avaliacao ON unid_acad.id = instru_avaliacao.id_unid_acad AND unid_acad.id_campus = $campus ORDER BY LTRIM(unid_acad.nome)");
                echo "<select id='unid_academica' onchange='change_unid_academica()'>";
                echo "<option>"; echo "Unidade Acadêmica" ; echo "</option>";
                while ($row=mysqli_fetch_array($res)) {
                  echo "<option value = '$row[id]'>"; echo utf8_encode($row["nome"]) ; echo "</option>";
                }
                echo "</select>";
            }

            if ($aux==1) 
            {
                $res=mysqli_query($conn,"SELECT DISTINCT curso.id_unid_acad,curso.id_campus,curso.id,curso.nome FROM curso INNER JOIN instru_avaliacao ON curso.id = instru_avaliacao.id_curso AND instru_avaliacao.id_unid_acad = $unid_academica AND curso.id_campus = $campus ORDER BY LTRIM(curso.nome)");
                echo "<select id='curso' onchange='change_curso()'>";
                echo "<option>"; echo "Curso" ; echo "</option>";
                while ($row=mysqli_fetch_array($res)) {
                  echo "<option value = '$row[id]' >"; echo utf8_encode($row["nome"]) ; echo "</option>";
                }
                echo "</select>";
            }

            if ($aux==2) 
            {
                $res=mysqli_query($conn,"SELECT DISTINCT instru_avaliacao.data_criacao FROM instru_avaliacao WHERE instru_avaliacao.id_campus = $campus AND instru_avaliacao.id_unid_acad = $unid_academica AND instru_avaliacao.id_curso = $curso ORDER BY instru_avaliacao.data_criacao");
                echo "<select>";
                echo "<option>"; echo "Avaliação/Data" ; echo "</option>";
                while ($row=mysqli_fetch_array($res)) {
                  echo "<option value = '$row[data_criacao]'>"; echo $row["data_criacao"] ; echo "</option>";
                }
                echo "</select>";
            }
?>