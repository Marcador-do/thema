<?php  
/**
 * [page-redactar.php]
 *
 * Page Redactar template.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @author Richard Blondet <richardblondet.com>
 * @package marcadordo
 */


do_action( $tag = 'enqueue_drop_zone' );
do_action( $tag = 'enqueue_summernotetext' );

get_header(); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-lg-9">
			<div id="redactar-form">
				<form action="" id="form-redactar">
					<div id="my-awesome-dropzone">
						<p> <i class="material-icons">file_upload</i> </p>
						<p>Arrastra una foto</p>
					</div>
					<div class="form-group">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12 col-sm-4">
									<input type="text" placeholder="Pie de Foto" class="form-control marcador-redactar">
								</div>
								<div class="col-xs-12 col-sm-4">
									<select name="categories" id="category" class="form-control marcador-redactar">
										<option>Categoría</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12">
									<input type="text" placeholder="Título" class="form-control marcador-redactar">
								</div>
							</div>
						</div>
					</div>
					<div class="form-grop">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12">
									<div id="summernote">Contenido</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12 col-sm-3 col-sm-push-9">
									<button class="btn btn-primary btn-block">
										Enviar
									</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				var myDropzone = new Dropzone("#my-awesome-dropzone", { 
					url: "/file/post",
					dictDefaultMessage: 'Arrasta una foto'
				});
				jQuery( document ).ready(function() {
					jQuery('#summernote').summernote({
						minHeight: 150
					});
				});
			});
		</script>
	</div>
</div>
<?php get_footer(); ?>