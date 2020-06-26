<!DOCTYPE html>
<html>

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

	<title>Editable Invoice</title>

	<link rel='stylesheet' type='text/css' href="{{url('/css/bill_style.css')}}" />
	<link rel='stylesheet' type='text/css' href="{{url('/css/bill_print.css')}}" media="print" />
	<!--<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>-->

</head>

<body>
	<div id="page-wrap">
		<textarea id="header">INVOICE</textarea>
		<div id="identity">
            <div id="address">
				Chris Coyier
				123 Appleseed Street
				Appleville, WI 53719
				Phone: (555) 555-5555
			</div>
			<div id="customer">
				<table id="meta">
					<tr>
						<td class="meta-head">Invoice #</td>
						<td><textarea>{{$customerHistory->id}}</textarea></td>
					</tr>
					<tr>

						<td class="meta-head">Date</td>
						<td><textarea id="date">{{$customerHistory->created_at}}</textarea></td>
					</tr>
					<tr>
						<td class="meta-head">Amount Due</td>
						<td><div class="due">{{$customerHistory->amount}}</div></td>
					</tr>
				</table>
			</div>
		</div>

		<div style="clear:both"></div>


		<table id="items" style="text-align: center;">
		    <tr>
		        <th>Item</th>
		        <th>Description</th>
		        <th>Unit Cost</th>
		        <th>Quantity</th>
		        <th>Price</th>
		    </tr>

		    <tr class="item-row">
		        <td class="item-name"><div class="delete-wpr"><textarea>{{$customerHistory->Product->name}}</textarea></div></td>
		        <td class="description"><textarea>{{$customerHistory->Product->description}}</textarea></td>
		        <td><textarea class="cost">{{$customerHistory->Product->selling_price}}</textarea></td>
		        <td><textarea class="qty">{{$customerHistory->quantity}}</textarea></td>
		        <td><span class="price">{{$customerHistory->amount}}</span></td>
		    </tr>

		    <tr>
		        <td colspan="2" class="blank"> </td>
		        <td colspan="2" class="total-line">Total</td>
		        <td class="total-value"><div id="total">{{$customerHistory->amount}}</div></td>
		    </tr>
		    <tr>
		        <td colspan="2" class="blank"> </td>
		        <td colspan="2" class="total-line">Amount Paid</td>
		        <td class="total-value"><textarea id="paid">{{$customerHistory->amount}}</textarea></td>
		    </tr>
		    <tr>
		        <td colspan="2" class="blank"> </td>
		        <td colspan="2" class="total-line balance">Balance Due</td>
		        <td class="total-value balance"><div class="due">0</div></td>
		    </tr>

		</table>

		<div id="terms">
		    <h5>Terms</h5>
		    <p>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</p>
		</div>

	</div>

</body>

</html>
