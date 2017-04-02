     <div class="col-md-12>
      <div class="box box-warning collapsed-box box-solid">
       <div class="box-header with-border">
        <h3 class="box-title">HISTÓRICO DE CARGOS DO ASSOCIADO</h3>
        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool btn-default" data-widget="collapse"><i class="fa fa-plus"></i> Clique aqui para expandir</button>
        </div>
       </div>
       <div class="box-body">
        <?php
         $QueryClubes = "SELECT * FROM icbr_historico WHERE hist_uid='$IDClube' AND hist_Tipo!='4'";
          $stmt = $PDO->prepare($QueryClubes);
          $stmt->execute();
        ?>
        <table id="cargos" class="table table-bordered table-striped">
         <thead>
          <tr>
           <th width="10%">Gestão</th>
           <th width="15%">Nível de cargo</th>
           <th width="30%">Clube</th>
           <th width="30%">Cargo</th>
           <th width="15%">Distrito</th>
          </tr>
         </thead>
         <tbody>
          <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
          <tr>
           <td><?php echo $user['hist_Gestao']; ?></td>
           <td>
            <?php 
              $TipoCargo = $user['hist_Tipo'];
              if ($TipoCargo === '1') {
                echo "Clube";
              }
              elseif ($TipoCargo === '2') {
                echo "Distrito";
              } 
              elseif ($TipoCargo === '3') {
                echo "IC Brasil";
              }
              else {
                //NADA AQUI
              }
            ?>
           </td>
           <td><?php echo $user['hist_Clube']; ?></td>
           <td><?php echo $user['hist_Cargo']; ?></td>
           <td><?php echo $user['hist_Distrito']; ?></td>             
          </tr>
         </tbody>
           <?php endwhile; ?>
        </table>
       </div>
      </div>
     </div>
     <div class="col-md-12">
      <div class="box box-primary collapsed-box box-solid">
       <div class="box-header with-border">
        <h3 class="box-title">HISTÓRICO DE PREMIAÇÕES</h3>
        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool btn-default" data-widget="collapse"><i class="fa fa-plus"></i> Clique aqui para expandir</button>
        </div>
       </div>
       <div class="box-body">
        <?php
         $Querypremio = "SELECT * FROM icbr_historico WHERE hist_uid='$IDClube' AND hist_Tipo='4'";
          $qryPremio = $PDO->prepare($Querypremio);
          $qryPremio->execute();
        ?>
        <table id="premios" class="table table-bordered table-striped">
         <thead>
          <tr>
           <th width="10%">Gestão</th>
           <th width="40%">Clube:</th>
           <th width="50%">Premio</th>
          </tr>
         </thead>
         <tbody>
          <?php while ($pre = $qryPremio->fetch(PDO::FETCH_ASSOC)): ?>
          <tr>
           <td><?php echo $pre['hist_Gestao']; ?></td>
           <td><?php echo '[' . $pre['hist_Distrito'] . '] - Interact Club de ' . $pre['hist_Clube']; ?></td>
           <td><?php echo $pre['hist_Cargo']; ?></td>
          </tr>
         </tbody>
           <?php endwhile; ?>
        </table>



       </div>
      </div>
     </div> 