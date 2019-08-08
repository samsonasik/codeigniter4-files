<?= view($config->views['header']) ?>

	<div class="row">
		<div class="col">
			<div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
				<div class="btn-group mr-2" role="group" aria-label="Action group">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dropzoneModal">
						<i class="fas fa-file-upload"></i> Add Files
					</button>
				</div>
				<div class="btn-group mr-2" role="group" aria-label="Format group">
					<a class="btn btn-secondary" href="<?= site_url("files/{$source}") ?>?format=cards" role="button"><i class="fas fa-th-large"></i></a>
					<a class="btn btn-outline-secondary" href="<?= site_url("files/{$source}") ?>?format=list" role="button"><i class="fas fa-list"></i></a>
				</div>
			</div>

			<h1>My Files</h1>

<?php if (empty($files)): ?>
			<p>
				You have no files! Would you like to
				<a class="dropzone-button" href="<?= site_url('files/new') ?>" data-toggle="modal" data-target="#dropzoneModal">add some now</a>?
			</p>

<?php else: ?>
			<div class="card-deck">
	<?php foreach ($files as $file): ?>
				<div class="card mb-4" style="min-width: 10rem; max-width: 200px;">
					<img src="<?= $file->thumbnail ?>" class="card-img-top img-thumbnail" alt="<?= $file->filename ?>">
					<div class="card-header">
						<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="export-<?= $file->id ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-share-square"></i> Options
						</button>
						<div class="dropdown-menu" aria-labelledby="export-<?= $file->id ?>">
							<h6 class="dropdown-header">Send To</h6>
							<a class="dropdown-item" href="#">Preview</a>
							<a class="dropdown-item" href="<?= site_url('files/export/download/' . $file->id) ?>">Download</a>
		<?php if ($access == 'manage'): ?>
							<div class="dropdown-divider"></div>
							<h6 class="dropdown-header">Manage</h6>
							<a class="dropdown-item" href="<?= site_url('files/rename/' . $file->id) ?>">Rename</a>
							<a class="dropdown-item" href="<?= site_url('files/delete/' . $file->id) ?>">Delete</a>
		<?php endif; ?>
						</div>
					</div>
					<div class="card-body">
						<h6 class="card-title"><?= bytes2human($file->size) ?></h6>
						<p class="card-text"><?= $file->filename ?></p>
					</div>
					<div class="card-footer">
						<small class="text-muted">Added <?= $file->created_at->humanize(); ?></small>
					</div>
				</div>
	<?php endforeach; ?>
			</div>
<?php endif; ?>
			
		</div>
	</div>

<?= view($config->views['footer'], ['config' => $config]) ?>
