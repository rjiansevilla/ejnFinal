<?php session('data'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h5 class="box-title"><b>Transaction No:</b> <?php echo e($data['transaction_no']); ?></h5>
				<h5 class="box-title float-right"><b>Date:</b> <?php echo e($data['date']); ?></h5>
			</div>
			<form method="POST" action="<?php echo e(url('save-cheque')); ?>">
				<?php echo csrf_field(); ?>
				<div class="box-body row">
					<div class="form-group col-md-6">
						<label for="" class="control-label">Issue To. <span class="text-danger">*</span></label>
						<input type="hidden" name="transaction_id" value="<?php echo e($data['id']); ?>">
						<h5 class="font-light"><?php echo e($data['name']); ?></h5>
					</div>
					<div class="form-group col-md-6">
						<label for="" class="control-label">Cheque No. <span class="text-danger">*</span></label>
						<input type="text" name="cheque_no" value="<?php echo e(old('cheque_no')); ?>" class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label for="" class="control-label">Bank <span class="text-danger">*</span></label>
						<select name="bank_id" class="form-control select2">
							<?php $__currentLoopData = $data['banks']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($value['id']); ?>"><?php echo e($value['name']); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="" class="control-label">Amount in figure. <span class="text-danger">*</span></label>
						<input type="text" name="amount" id="amount" value="<?php echo e(old('amount')); ?>" class="form-control">
					</div>
					<div class="form-group col-md-12 mb-0">
						<label for="" class="control-label">Amount in words</span></label>
						<input type="hidden" name="amount_words" value="<?php echo e(old('amount_words')); ?>" id="amount_words">
						<h5 class="text-muted amount-words mb-0"></h5>
					</div>
				</div>
				<div class="box-footer text-right p-1">
					<button type="reset" class="btn btn-danger">RESET</button>
					<button type="submit" class="btn btn-primary">SAVE</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
$(document).ready(function() {
	// Init select2
	$('.select2').select2();

	$('#amount').on('keyup', function() {
		var amount = $(this).val();

		var words = new Array();
		words[0] = '';
		words[1] = 'One';
		words[2] = 'Two';
		words[3] = 'Three';
		words[4] = 'Four';
		words[5] = 'Five';
		words[6] = 'Six';
		words[7] = 'Seven';
		words[8] = 'Eight';
		words[9] = 'Nine';
		words[10] = 'Ten';
		words[11] = 'Eleven';
		words[12] = 'Twelve';
		words[13] = 'Thirteen';
		words[14] = 'Fourteen';
		words[15] = 'Fifteen';
		words[16] = 'Sixteen';
		words[17] = 'Seventeen';
		words[18] = 'Eighteen';
		words[19] = 'Nineteen';
		words[20] = 'Twenty';
		words[30] = 'Thirty';
		words[40] = 'Forty';
		words[50] = 'Fifty';
		words[60] = 'Sixty';
		words[70] = 'Seventy';
		words[80] = 'Eighty';
		words[90] = 'Ninety';
		amount = amount.toString();
		var atemp = amount.split(".");
		var number = atemp[0].split(",").join("");
		var n_length = number.length;
		var words_string = "";
		if (n_length <= 9) {
			var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
			var received_n_array = new Array();
			for (var i = 0; i < n_length; i++) {
				received_n_array[i] = number.substr(i, 1);
			}
			for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
				n_array[i] = received_n_array[j];
			}
			for (var i = 0, j = 1; i < 9; i++, j++) {
				if (i == 0 || i == 2 || i == 4 || i == 7) {
					if (n_array[i] == 1) {
						n_array[j] = 10 + parseInt(n_array[j]);
						n_array[i] = 0;
					}
				}
			}
			value = "";
			for (var i = 0; i < 9; i++) {
				if (i == 0 || i == 2 || i == 4 || i == 7) {
					value = n_array[i] * 10;
				} else {
					value = n_array[i];
				}
				if (value != 0) {
					words_string += words[value] + " ";
				}
				if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
					words_string += "Crores ";
				}
				if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
					words_string += "Lakhs ";
				}
				if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
					words_string += "Thousand ";
				}
				if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
					words_string += "Hundred and ";
				} else if (i == 6 && value != 0) {
					words_string += "Hundred ";
				}
			}
			words_string = words_string.split("  ").join(" ");
		}
		$('.amount-words').html(words_string);
		$('#amount_words').val(words_string);
	})
	
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ejn\ej\resources\views/admin/transaction/cheque-form.blade.php ENDPATH**/ ?>