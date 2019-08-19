<?php session('data'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h5 class="box-title"><b>Transaction No:</b> <?php echo e($data['transaction']['transaction_no']); ?></h5>
				<h5 class="box-title float-right"><b>Date:</b> <?php echo e($data['transaction']['date']); ?></h5>
			</div>
			<form method="POST" action="<?php echo e(url('save-cheque')); ?>">
				<?php echo csrf_field(); ?>
				<div class="box-body row">
					<div class="form-group col-md-6">
						<label for="" class="control-label">Issue To. <span class="text-danger">*</span></label>
						<input type="hidden" name="transaction_id" value="<?php echo e($data['transaction']['id']); ?>">
						<h5 class="font-light"><?php echo e($data['transaction']['agent']); ?></h5>
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
						<input type="hidden" name="amount" id="amount" value="<?php echo e($data['transaction']['amount']); ?>" class="form-control">
						<h5 class="font-light"><?php echo e($data['transaction']['amount']); ?></h5>
					</div>
					<div class="form-group col-md-12 mb-0">
						<label for="" class="control-label">Amount in words</span></label>
						<input type="hidden" name="amount_words" value="<?php echo e(old('amount_words')); ?>" id="amount_words">
						<h5 class="text-muted amount-words mb-0"></h5>
					</div>
				</div>
				<div class="box-footer text-right p-1">
					<a href="<?php echo e(url('cheque-transaction')); ?>" class="btn btn-info">DONE</a>
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

	const arr = x => Array.from(x);
	const num = x => Number(x) || 0;
	const str = x => String(x);
	const isEmpty = xs => xs.length === 0;
	const take = n => xs => xs.slice(0,n);
	const drop = n => xs => xs.slice(n);
	const reverse = xs => xs.slice(0).reverse();
	const comp = f => g => x => f (g (x));
	const not = x => !x;
	const chunk = n => xs =>
	isEmpty(xs) ? [] : [take(n)(xs), ...chunk (n) (drop (n) (xs))];

	// numToWords :: (Number a, String a) => a -> String
	let numToWords = n => {
	
	let a = [
		'', 'one', 'two', 'three', 'four',
		'five', 'six', 'seven', 'eight', 'nine',
		'ten', 'eleven', 'twelve', 'thirteen', 'fourteen',
		'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
	];
	
	let b = [
		'', '', 'twenty', 'thirty', 'forty',
		'fifty', 'sixty', 'seventy', 'eighty', 'ninety'
	];
	
	let g = [
		'', 'thousand', 'million', 'billion', 'trillion', 'quadrillion',
		'quintillion', 'sextillion', 'septillion', 'octillion', 'nonillion'
	];
	
	// this part is really nasty still
	// it might edit this again later to show how Monoids could fix this up
	let makeGroup = ([ones,tens,huns]) => {
		return [
		num(huns) === 0 ? '' : a[huns] + ' hundred ',
		num(ones) === 0 ? b[tens] : b[tens] && b[tens] + '-' || '',
		a[tens+ones] || a[ones]
		].join('');
	};
	
	let thousand = (group,i) => group === '' ? group : `${group} ${g[i]}`;
	
	if (typeof n === 'number')
		return numToWords(String(n));
	else if (n === '0')
		return 'zero';
	else
		return comp (chunk(3)) (reverse) (arr(n))
		.map(makeGroup)
		.map(thousand)
		.filter(comp(not)(isEmpty))
		.reverse()
		.join(' ');
	};
	
	var amount = $('input[name="amount"]').val();
	$('#amount_words').val(numToWords(amount));
	$('.amount-words').html(numToWords(amount));

	
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ejn\ej\resources\views/admin/cheque/cheque-form.blade.php ENDPATH**/ ?>