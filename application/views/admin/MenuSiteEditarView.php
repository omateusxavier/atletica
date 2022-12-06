	<?php $m = $this->MenuSiteModel; ?>
	
	<input type="hidden" id="txtIdMenu" name="txtIdMenu" value="<?php echo $m->idmenu; ?>" />

	<div class="row">

		<div class="col-md-12">

			<label for="txtDescricao">Descrição: *</label>
			<input type="text" class="form-control" id="txtDescricao" name="txtDescricao" value="<?php echo $m->descricao; ?>" required />

		</div>

	</div>

	<div class="row">

		<div class="col-md-8">

			<label for="txtUrl">Url: *</label>
			<input type="text" class="form-control" id="txtUrl" name="txtUrl" value="<?php echo $m->link; ?>" required />

		</div>

		<div class="col-md-4">

			<label for="txtTarget">Target: *</label>
			<select class="form-control" id="txtTarget" name="txtTarget" required>
				<option value="_blank" <?php if($m->target == "_blank"){ echo "selected"; } ?>>Nova pagina</option>
				<option value="_self" <?php if($m->target == "_self"){ echo "selected"; } ?>>Mesma pagina</option>
			</select>

		</div>

	</div>

	<div class="row">

		<div class="col-md-3">

			<label for="txtPosicao">Posição: *</label>
			<input type="number" class="form-control" id="txtPosicao" name="txtPosicao" value="<?php echo $m->posicao; ?>" required />

		</div>

		<div class="col-md-4">

			<label for="txtVisivel">Visivel:</label>
			<select class="form-control" id="txtVisivel" name="txtVisivel" required>
				<option value="S" <?php if($m->visivel == "S"){ echo "selected"; } ?>>Sim</option>
				<option value="N" <?php if($m->visivel == "N"){ echo "selected"; } ?>>Não</option>
			</select>

		</div>

		<div class="col-md-5">

			<label for="txtContexto">Contexto: *</label>
			<input type="text" class="form-control" id="txtContexto" name="txtContexto" value="<?php echo $m->contexto; ?>" required />

		</div>

	</div>