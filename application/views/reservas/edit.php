    <div class="form-group">
      
      <input type="hidden" name="edit_id" value="<?php echo $reservas->id_reserva; ?>">
      
      <label for="projectinput5">Servicio Solicitado </label>
      
      <select id="projectinput5" name="id_producto" value="<?php echo $reservas->id_producto; ?>" class="form-control" required="">
        <!--   <option value="none" selected="" disabled="">Seleccione</option> -->
        <?php foreach($servicios as $servicio):?>
          <?php 
          if ($servicio->id_producto==$reservas->id_producto){
            $selected="selected";
          } else {
            $selected="";
          }
          ?>
          <option value="<?php echo $servicio->id_producto;?>"<?php echo $selected;?> > <?php echo $servicio->descripcion; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="projectinput5">Fecha</label>
          <div class="input-group">
            <input type="text" id=""  class="form-control fecha-autoclose" placeholder="yyyy-mm-dd" name="fecha_evento" value="<?php echo $reservas->fecha_evento ?>">
            <span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
          </div>


        </div>
      </div>
      <div class="col-md-6">
        <label>Hora del Evento</label>
        <div class="input-group m-b-15">

          <div class="bootstrap-timepicker">
            <input id="" type="text" name="hora_evento" class="form-control hora" value="<?php echo $reservas->hora_evento ?>">
          </div>
          <span class="input-group-addon bg-primary b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
        </div><!-- input-group -->

      </div>

    </div>

    <div class="form-group">
      <label for="timesheetinput1">Detalle del Lugar del Evento</label>
      <div class="position-relative has-icon-left">
        <input type="text" id="timesheetinput1" class="form-control" placeholder="Descripcion completa del lugar del evento" name="lugar_evento" value="<?php echo $reservas->lugar_evento ?>" required="">
        <div class="form-control-position">
          <i class="icon-android-cart"></i>
        </div>
      </div>
    </div>
  </div><!-- end div class FORM body--> 
  <script>

   jQuery('.fecha-autoclose').datepicker({
    format: "yyyy-mm-dd",
    autoclose: true,
    todayHighlight: true
  });
   jQuery('.hora').timepicker({
    autoclose: true,
    defaultTIme : true
  });



</script>