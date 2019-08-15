@extends('adminlte::page')
@php session('data'); @endphp
@section('content')
<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h5 class="box-title"><b>Transaction No:</b> {{$data['transaction']['transaction_no']}}</h5>
				<h5 class="box-title float-right"><b>Date:</b> {{$data['transaction']['date']}}</h5>
			</div>
			<form method="POST" action="{{ url('save-cheque') }}">
				@csrf
				<div class="box-body row">
					<div class="form-group col-md-6">
						<label for="" class="control-label">Issue To. <span class="text-danger">*</span></label>
						<input type="hidden" name="transaction_id" value="{{ $data['transaction']['id'] }}">
						<input type="hidden" name="agent_id" value="{{ $data['transaction']['agent_id'] }}">
						<input type="hidden" name="agent" value="{{ $data['transaction']['agent'] }}">
						<h5 class="font-light">{{ $data['transaction']['agent'] }}</h5>
					</div>
					<div class="form-group col-md-6">
						<label for="" class="control-label">Cheque No. <span class="text-danger">*</span></label>
						<input type="text" name="cheque_no" value="{{ old('cheque_no') }}" class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label for="" class="control-label">Bank <span class="text-danger">*</span></label>
						<select name="bank_id" class="form-control select2">
							@foreach($data['banks'] as $value)
							<option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="" class="control-label">Amount in figure. <span class="text-danger">*</span></label>
						<input type="hidden" name="amount" id="amount" value="{{ $data['transaction']['amount'] }}" class="form-control">
						<h5 class="font-light ">{{ $data['transaction']['amount'] }}</h5>
					</div>
					<div class="form-group col-md-12 mb-0">
						<label for="" class="control-label">Amount in words</span></label>
						<input type="hidden" name="amount_words" value="{{ old('amount_words') }}" id="amount_words">
						<h5 class="text-muted amount-words mb-0"></h5>
					</div>
				</div>
				<div class="box-footer text-right p-1">
					<a href="{{ url('cheque-transaction') }}" class="btn btn-info">DONE</a>
					<button type="submit" class="btn btn-primary">SAVE</button>
				</div>
			</form>
		</div>
	</div>
</div>
@stop

@section('css')

@stop

@section('js')
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
		'', 'One', 'Two', 'Three', 'Four',
		'Five', 'Six', 'Seven', 'Eight', 'Nine',
		'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen',
		'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'
	];
	
	let b = [
		'', '', 'Twenty', 'Thirty', 'Forty',
		'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'
	];
	
	let g = [
		'', 'Thousand', 'Million', 'Billion', 'Trillion', 'Quadrillion',
		'Quintillion', 'Sextillion', 'Septillion', 'Octillion', 'Nonillion'
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
	$('#amount_words').val(numToWords(amount)+"Pesos"+" "+"Only");
	$('.amount-words').html(numToWords(amount)+"Pesos"+" "+"Only");

	
})
</script>
@stop